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
        $searchResponse = Http::get('https://api.rawg.io/api/games', [
            'key' => config('services.rawg.key'),
            'search' => $name,
        ]);

        if (!$searchResponse->successful() || empty($searchResponse['results'])) {
            return ['status' => 'error', 'message' => 'No se encontró el juego en RAWG'];
        }

        $rawgGame = $searchResponse['results'][0];
        $rawgId = $rawgGame['id'];

        $detailResponse = Http::get("https://api.rawg.io/api/games/{$rawgId}", [
            'key' => config('services.rawg.key'),
        ]);

        if (!$detailResponse->successful()) {
            return ['status' => 'error', 'message' => 'No se pudo obtener el detalle del juego'];
        }

        return ['status' => 'ok', 'data' => $detailResponse];
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
        $game = $this->searchGameByName($name);

        if ($game) {
            return response()->json(['source' => 'local', 'game' => $game]);
        }

        $detailResponse = $this->searchGameByNameInRawg($name);

        if ($detailResponse['status'] === 'error'){
            return response()->json($detailResponse, 500);
        }

        $data = $detailResponse['data'];
        $game = $this->createGame($data);

        return response()->json(['source' => 'rawg', 'game' => $game->load(['developers', 'publishers'])]);
    }
}
