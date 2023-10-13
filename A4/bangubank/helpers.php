<?php

function view(string $view, array $data=[]){
    extract($data);
    require_once __DIR__ . "/views/{$view}.php";
}
function redirect($location){
    header("Location:$location");
}