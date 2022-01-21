<?php 
session_start();
require 'assets/php/config.php';
require 'assets/php/dao/ClienteDaoMysql.php';

$clienteDao = new ClienteDaoMysql($pdo);

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');

if ($nome && $email && $telefone){
   if($clienteDao->findByEmail($email) === false){
      $novoCliente = new Cliente();
      $novoCliente->setNome($nome);
      $novoCliente->setEmail($email);
      $novoCliente->setTelefone($telefone);

      $clienteDao->add($novoCliente);

      echo "<h1>Cadastrado com Sucesso</h1>";
      echo "<a href='index.php'>Voltar</a>";
   }else{
      header("Location: index.php");
      exit;
   }

   
}else{
   header("Location: ../../index.php");
   exit;
}