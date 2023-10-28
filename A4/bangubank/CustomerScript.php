#!/usr/bin/env php
<?php
require 'vendor/autoload.php';
use CLI\Customer\CustomerCLIApp;
echo("------------Customer Panel------------\n");
$customerCliApp = new CustomerCLIApp();
$customerCliApp->run();

