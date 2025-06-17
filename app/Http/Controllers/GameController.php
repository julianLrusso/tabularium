<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Game;
use App\Models\Publisher;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    protected $rawgKey;
    public function __construct() {
        $this->rawgKey = config('services.rawg.key');
    }

    public function searchGameByName($name): Game|null{
        return Game::where('name', 'like', '%'.$name.'%')->with(['developers', 'publishers'])->first();
    }

    public function searchGameByNameInRawg($name): array{
        // Guardar más que solo el primero.
        // Mostrar varios para solucionar el problema.
        $searchResponse = Http::get('https://api.rawg.io/api/games', [
            'key' => config('services.rawg.key'),
            'search' => $name,
            'search_precise' => 1,
            'page_size' => 20,
        ]);

        if (!$searchResponse->successful() || empty($searchResponse['results'])) {
            return ['status' => 'error', 'message' => 'No se encontraron juegos en RAWG'];
        }

        return ['status' => 'ok', 'results' => $searchResponse['results']];
    }

    protected function getGameDetailFromRawg($id): ?Response {
        $response = Http::get("https://api.rawg.io/api/games/{$id}", [
            'key' => config('services.rawg.key'),
        ]);

        return $response->successful() ? $response : null;
    }

    public function createGame(Response $data) {
        $game = Game::create([
            'rawg_id' => $data['id'],
            'name' => $data['name'],
            'description' => $data['description_raw'] ?? '',
            'cover_url' => $data['background_image'] ?? null,
            'platforms' => collect($data['platforms'])->pluck('platform.name')->join(', '),
            'release_date' => $data['released'] ?? null,
        ]);

        foreach ($data['developers'] ?? [] as $devData) {
            $developer = Developer::firstOrCreate(['name' => $devData['name']]);
            $game->developers()->attach($developer->id);
        }

        foreach ($data['publishers'] ?? [] as $pubData) {
            $publisher = Publisher::firstOrCreate(['name' => $pubData['name']]);
            $game->publishers()->attach($publisher->id);
        }

        return $game;
    }

    public function findOrImportByName(Request $request)
    {
        $name = $request->input('name');

        $localGames = Game::where('name', 'like', '%' . $name . '%')->take(5)->get(
            ['id', 'name', 'release_date', 'cover_url', 'platforms']
        );
        if ($localGames->count() > 0) {
            return response()->json(['source' => 'local', 'games' => $localGames]);
        }

        $rawgResponse = $this->searchGameByNameInRawg($name);
        if ($rawgResponse['status'] === 'error') {
            return response()->json($rawgResponse, 500);
        }

        $savedGames = collect();
        foreach ($rawgResponse['results'] as $result) {
            $existing = Game::where('rawg_id', $result['id'])->first();
            if ($existing) {
                $savedGames->push($existing);
                continue;
            }

            $detail = $this->getGameDetailFromRawg($result['id']);
            if (!$detail) continue;

            $newGame = $this->createGame($detail);
            $savedGames->push($newGame);
        }

        return response()->json([
            'source' => 'rawg',
            'games' => $savedGames->take(5)->map(fn($g) => [
                'id' => $g->id,
                'name' => $g->name,
                'release_date' => $g->release_date,
                'platforms' => $g->platforms,
                'cover_url' => $g->cover_url,
            ])->values()
        ]);
    }
}
