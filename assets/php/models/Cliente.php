<?php

class Cliente {
   private $id;
   private $nome;
   private $email;
   private $telefone;

   public function getId() {
      return $this->id;
   }
   public function setId($i) {
      $this->id = trim($i);
   }

   public function getNome() {
      return $this->nome;
   }
   public function setNome($n) {
      $this->nome = ucwords(trim($n));
   }

   public function getEmail() {
      return $this->email;
   }
   public function setEmail($e) {
      $this->email = strtolower(trim($e));
   }

   public function getTelefone() {
      return $this->telefone;
   }
   public function setTelefone($t) {
      $this->telefone = strtolower(trim($t));
   }

}

interface ClienteDAO {
   public function add(Cliente $u);
   public function findAll();
   public function findById($id);
   public function findByEmail($email);
   public function update(Cliente $u);
   public function delete($id);
}