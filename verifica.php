<?php
session_start();
require 'assets/php/config.php';
require 'assets/php/dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$nome = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
$senha = filter_input(INPUT_POST, 'password');

$hash = password_hash($senha, PASSWORD_DEFAULT);

$lista = $usuarioDao->findLogin($nome);

$senhaHash = $lista->getSenha();


if($nome === $lista->getLogin() && password_verify($senha, $senhaHash)){
   $time = time() + (60 * 60 * 24 * 30);
   setcookie('nome', $nome, $time);
   header("Location: index.php");
   exit;
}else{
   header("Location: login.php");
   exit;
} 



?>