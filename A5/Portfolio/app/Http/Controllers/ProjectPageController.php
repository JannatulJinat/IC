<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectPageController extends Controller
{
    public function index()
    {
        $jsonFilePath = storage_path('portfolioData/projects.json');
        $jsonContent = json_decode(file_get_contents($jsonFilePath));
        return view("projects", [
            "jsonContent" => $jsonContent
        ]);
    }

    public function show($id)
    {
        $jsonFilePath = storage_path('portfolioData/projects.json');
        $jsonContent = json_decode(file_get_contents($jsonFilePath));
        $jsonIndex = $id-1;
        return view("project", [
            "jsonContent" => $jsonContent[$jsonIndex]
        ]);
    }
}
