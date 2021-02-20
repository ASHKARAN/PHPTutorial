<?php
namespace miniShop;

//Allow AJAX Request
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

date_default_timezone_set('Asia/Tehran');

include_once 'Config.php';
include_once 'Router.php';
include_once 'MyPDO.php';
include_once 'App.php';

//Display Errors On OutPut
 if(Config::$DEBUG_MODE) {
    ini_set('display_errors', 1);
    error_reporting( E_ALL );
}
else {
    ini_set('display_errors', 0);
}


if(!isset($_GET["ROUTE" ]) || !isset($_GET[  "ACTION" ])|| !isset($_GET[  "API_VERSION" ]))   {
    echo "not enough data";
}
else {
    $version     = $_GET["API_VERSION"];
    $route    = $_GET["ROUTE"];
    $action    = $_GET["ACTION"];

    App::loadAllClasses("./api/$version/");

    new Router($route, $action);
}












