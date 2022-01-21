<?php
session_start();
require 'assets/php/config.php';
require 'assets/php/dao/ClienteDaoMysql.php';

$clienteDao = new ClienteDaoMysql($pdo);

$cliente = false;
$id = filter_input(INPUT_GET, 'id');

if($id) {
   $cliente = $clienteDao->findById($id);
}

if($cliente === false) {
   header("Location: index.php");
   exit;
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="assets/css/style.css">
   <title>Editar</title>
</head>
<body>
   <h1>Editar Cliente</h1>
   <form action="editar-action.php" method="post">
      <input type="hidden" name="id" value="<?=$cliente->getId(); ?>">
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" value="<?=$cliente->getNome(); ?>">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="<?=$cliente->getEmail(); ?>">
      <label for="telefone">Telefone:</label>
      <input type="telefone" name="telefone" id="telefone" value="<?=$cliente->getTelefone(); ?>">
      <div><button>Salvar</button></div>
   </form>
</body>
</html>

