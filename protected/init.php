<?php

spl_autoload_register(function($class){
	include "Core/".$class.'.php';
});

$route = new Route();

include "routes.php";

