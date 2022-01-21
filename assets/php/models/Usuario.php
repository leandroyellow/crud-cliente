<?php
class Usuario {
   private $login;
   private $senha;

   public function getLogin(){
      return $this->login;
   }
   public function setLogin($l){
      $this->login = $l;
   }

   public function getSenha(){
      return $this->senha;
   }
   public function setSenha($s){
      $this->senha = $s;
   }
}

interface UsuarioDao {
   public function findLogin($login);
}