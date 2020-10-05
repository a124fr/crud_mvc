<?php

require 'environment.php';
$config = array();

if(ENVIRONMENT == 'developnment')
{
	define("BASE_URL", "http://localhost/crud_mvc/");
	$config['dbname'] = 'crud_mvc';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
	$config['port'] = 3304;
}
else 
{
	define("BASE_URL", "http://meusite.com.br/");
	$config['dbname'] = 'crud_mvc';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
	$config['port'] = 3304;
}

global $db;
try
{	
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'].";port=".$config['port'], $config['dbuser'], $config['dbpass']);
}
catch(PDOException $e)
{
	echo "ERRO: ".$e->getMessage();
}