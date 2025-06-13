<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Pest\Laravel\json;

class HomeController extends Controller
{
    public function homeView(){
        $userName = auth()->user() ? auth()->user()->name : 'Usuario';
        $chartsDataSets = json_encode([[
            "label" => "Rating",
            "data" => [1, 5, 2, 7, 3, 4, 8, 6, 3,2],
            "backgroundColor" => "#D99111",
            "borderRadius" => 6,
            "borderSkipped" => false
        ]]);
        $chartLabel = json_encode(["10", "20", "30", "40", "50", "60", "70", "80", "90", "+90"]);
        $chartsOptions = json_encode([
            "scales" => [
                "y" => ["beginAtZero" => true, "ticks" => ["stepSize" => 1]]
            ],
            "plugins" => [
                "legend" => ["display" => false]
            ]
        ]);
        return view('home', [
            'userName' => $userName,
            'chartsDataSets' => $chartsDataSets,
            'chartLabel' => $chartLabel,
            'chartsOptions' => $chartsOptions
        ]);
    }
}
