<?php
session_start();
require 'assets/php/config.php';
require 'assets/php/dao/ClienteDaoMysql.php';

$clienteDao = new ClienteDaoMysql($pdo);


$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');

if($id && $nome && $email && $telefone) {
   $cliente = new Cliente();
   $cliente->setId($id);
   $cliente->setNome($nome);
   $cliente->setEmail($email);
   $cliente->setTelefone($telefone);

   $clienteDao->update($cliente);
   
   echo "<h1>Atualizado com Sucesso</h1>";
   echo "<a href='index.php'>Voltar</a>";
   
}else{
   header("Location: editar.php?id=$id");
   exit;
}


?>