<?php
require_once 'assets/php/models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDao{
   private $pdo;

   public function __construct(PDO $driver) {
      $this->pdo = $driver;
   }
   
   public function findLogin($login){
      
      $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE login = :login");
      $sql->bindValue(':login', $login);
      
      $sql->execute();

      if($sql->rowCount() > 0){
         $data = $sql->fetch();

         $u = new Usuario();
         $u->setLogin($data['login']);
         $u->setSenha($data['senha']);
         

         return $u;
      }else{
         return false;
      }
      
   }
}