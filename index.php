<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \DTS\Page;
use \DTS\PageAdmin;

//$app = new \Slim\Slim();
$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	/*
	$sql = new DTS\DB\Sql();
	$results = $sql->select("SELECT * FROM tb_users");

	echo json_encode($results);
	*/
	$page = new Page();

	$page->setTpl("index");

	$page->setTpl("footer");


});


$app->get('/admin', function() {
    
	/*
	$sql = new DTS\DB\Sql();
	$results = $sql->select("SELECT * FROM tb_users");

	echo json_encode($results);
	*/
	$page = new PageAdmin();

	$page->setTpl("index");

	$page->setTpl("footer");


});

$app->run();

 ?>