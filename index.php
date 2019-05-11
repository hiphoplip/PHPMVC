<?php 
require_once('core/autoload.php');
require_once('core/database.php');
require_once('core/request.php');
require_once('core/helper.php');
require_once('core/routes.php');

session_start();

Routes::get("/", "WorkController@index");
Routes::get("/work/edit/{id}", "WorkController@edit");
Routes::get("/work/add", "WorkController@edit");
Routes::get("/work", "WorkController@index");
Routes::get("/work/show", "WorkController@show");
Routes::post("/work/submit", "WorkController@submit");
Routes::post("/work/show", "WorkController@GetAllTask");

Routes::dispatch();

?>