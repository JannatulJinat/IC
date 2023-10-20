<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkExperiencePageController extends Controller
{
    public function index() {
        $jsonFilePath = storage_path('portfolioData/workExperience.json');
        $jsonContent = json_decode(file_get_contents($jsonFilePath));
        return view("workExperience", [
            "jsonContent" => $jsonContent
        ]);
    }
}
