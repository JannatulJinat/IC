#!/usr/bin/env php
<?php
require 'vendor/autoload.php';
use App\Customer\CustomerCLIApp;
echo("------------Customer Panel------------\n");
$customerCliApp = new CustomerCLIApp();
$customerCliApp->run();

