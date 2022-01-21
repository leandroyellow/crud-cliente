<?php
session_start();
require 'assets/php/config.php';
require 'assets/php/dao/ClienteDaoMysql.php';

$clienteDao = new ClienteDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id){
   $clienteDao->delete($id);
}

header("location: index.php");
exit;

?>