<?php
require 'environment.php';

$config = array();

if(ENVIRONMENT == 'development') {
    define("BASE_URL", "http://projetox.pc/olxmvc/");
    $config['dbname'] = 'classificados';
    $config['host'] = 'localhost:3308';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    define("BASE_URL", "http://classificados.com.br");
    $config['dbname'] = 'classificados';
    $config['host'] = 'localhost:3308';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'senha';
}

global $db;

try {
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass']) ;
} catch (PDOException $e) {
    echo "Erro: ".$e.getMessage();
    exit;
}