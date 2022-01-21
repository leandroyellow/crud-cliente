<?php
session_start(); 
if(isset($_COOKIE['nome'])){
   $nome = $_COOKIE['nome'];
}else{
   header("Location: login.php");
   exit;
}

require 'assets/php/config.php';
require 'assets/php/dao/ClienteDaoMysql.php';

$clienteDao = new ClienteDaoMysql($pdo);

$lista = $clienteDao->findAll();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="assets/css/style.css">
   <title>Document</title>
</head>
<body>
<div class="container">
<div class="link"><a href="form-cadastro-cliente.php">Cadastrar</a></div>


<table>
   <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>email</th>
      <th>Ações</th>
   </tr>
   <?php foreach($lista as $cliente): ?>
   <tr>
      <th><?=$cliente->getId();?></th>
      <th class="alinhar"><?=$cliente->getNome();?></th>
      <th class="alinhar"><?=$cliente->getEmail();?></th>
      <th>
         <a href="editar.php?id=<?=$cliente->getId();?>">Editar</a>
         <a href="excluir.php?id=<?=$cliente->getId();?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
      </th>
   </tr>
   <?php endforeach; ?>
</table>
<div><a href="logout.php">Sair</a></div>
</div>
</body>
</html>
