<?php

include_once('config.php');

ChatAutoload::start();

$request = substr($_SERVER['REQUEST_URI'], 1);
$route = new Route($request);
$route->renderController();

