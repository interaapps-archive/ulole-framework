<?php
// Directory for the views
$views_dir      =  "resources/views/";
$templates_dir  =  "resources/views/templates/";

// Routes

$router->get("/", "homepage.php");
$router->get("/about", "!AboutController@about");
$router->all("/about/test", "!AboutController@api");


$router->get("/d/([a-z]*)", "customtest.php");

$router->setPageNotFound("404.php");