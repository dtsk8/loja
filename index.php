<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \DTS\Page;
use \DTS\PageAdmin;
use \DTS\Model\User;

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
    

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index");

	$page->setTpl("footer");


});

$app->get('/admin/login', function() {
    

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");

	$page->setTpl("footer");


});

$app->post('/admin/login', function() {
    
	User::login($_POST["login"], $_POST["password"]);

	header("Location: /admin/login");

	exit;


});

$app->get('/admin/logout', function() {

	User::logout();

	header("Location: /admin/login");

	exit;


});

$app->run();

 ?>