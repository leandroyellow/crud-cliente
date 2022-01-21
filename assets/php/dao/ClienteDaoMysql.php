<?php

require_once 'assets/php/models/Cliente.php';

class ClienteDaoMysql implements ClienteDAO {
   private $pdo;

   public function __construct(PDO $driver) {
      $this->pdo = $driver;
   }
   
   public function add(Cliente $u){
      $sql = $this->pdo->prepare("INSERT INTO clientes (nome, email, telefone) VALUES (:nome, :email, :telefone)");
      $sql->bindvalue(':nome', $u->getNome());
      $sql->bindValue(':email', $u->getEmail());
      $sql->bindValue(':telefone', $u->getTelefone());
      $sql->execute();

      $u->setId($this->pdo->lastInsertId());
      return $u;
   }

   public function findAll(){
      $array = [];
      $sql = $this->pdo->query("SELECT * FROM  clientes");
      if($sql->rowCount() > 0){
         $data = $sql->fetchAll();

         foreach($data as $item) {
            $u = new Cliente();
            $u->setId($item['id']);
            $u->setNome($item['nome']);
            $u->setEmail($item['email']);
            $u->setTelefone($item['telefone']);

            $array[] = $u;
         }
      }
      return $array;
   }

   public function findById($id){
      $sql = $this->pdo->prepare("SELECT * FROM clientes WHERE id = :id");
      $sql->bindValue(':id', $id);
      $sql->execute();

      if($sql->rowCount() > 0) {
         $data = $sql->fetch();

         $u = new Cliente();
         $u->setId($data['id']);
         $u->setNome($data['nome']);
         $u->setEmail($data['email']);
         $u->setTelefone($data['telefone']);

         return $u;
      }else{
         return false;
      }
   }

   public function findByEmail($email){
      $sql = $this->pdo->prepare("SELECT * FROM clientes WHERE email = :email");
      $sql->bindValue(':email', $email);
      $sql->execute();

      if($sql->rowCount() > 0) {
         $data = $sql->fetch();

         $u = new Cliente();
         $u->setId($data['id']);
         $u->setNome($data['nome']);
         $u->setEmail($data['email']);
         $u->setTelefone($data['telefone']);

         return $u;
      }else{
         return false;
      }
   }

   public function update(Cliente $u){
      $sql = $this->pdo->prepare("UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id");
      $sql->bindValue(':nome', $u->getNome());
      $sql->bindValue(':email', $u->getEmail());
      $sql->bindValue(':telefone', $u->getTelefone());
      $sql->bindValue(':id', $u->getId());
      $sql->execute();

      return true;
   }

   public function delete($id){
      $sql = $this->pdo->prepare("DELETE FROM clientes WHERE id = :id");
      $sql->bindValue(':id', $id);
      $sql->execute();
   }
}


?>