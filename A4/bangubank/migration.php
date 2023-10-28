<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Models\Model;

$model = new Model();
$model->createTable();
echo "Please check phpmyadmin. Tables are created successfully.";
