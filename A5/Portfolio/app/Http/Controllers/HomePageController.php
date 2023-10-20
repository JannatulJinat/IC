<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HomePageController extends Controller
{
    public function index() {
        $jsonFilePath = storage_path('portfolioData/data.json');
        $jsonContent = json_decode(file_get_contents($jsonFilePath));
        return view("home", [
            "jsonContent" => $jsonContent
        ]);
    }
}
