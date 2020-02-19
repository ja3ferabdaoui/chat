<?php

include_once('config.php');
require_once(ROOT . '/config/database.php');

class UserManager
{
    private $db;

    public function __construct()
    {
          $this->db = new Database();
    }

    public function findById($id)
    {
            
       $query  = "SELECT * FROM users WHERE id = :id";
       $req    = $this->db->prepare($query);
       $req->bindvalue(':id', $id, PDO::PARAM_INT);
       $req->execute();
       $row = $req->fetch(PDO::FETCH_ASSOC);

       $user = new User();
       $user->setId($row['id']);
       $user->setUserName($row['username']);
       $user->setEmail($row['email']);
       $user->setStatus($row['status']);
       $user->setCreatedAt($row['createdAt']);

      return $user->jsonSerialize();
    }

    public function findByEmail($email)
    {
            
       $query  = "SELECT * FROM users WHERE email = :email";
       $req    = $this->db->prepare($query);
       $req->bindvalue(':email', $email, PDO::PARAM_STR);
       $req->execute();
       $row = $req->fetch(PDO::FETCH_ASSOC);

       $user = new User();
       $user->setId($row['id']);
       $user->setUserName($row['username']);
       $user->setEmail($row['email']);
       $user->setStatus($row['status']);
       $user->setCreatedAt($row['createdAt']);
       
       return $user->jsonSerialize();
    }

    public function save($params)
    {
            
       $query  = "INSERT INTO users (username, email, status, createdAt) VALUES (:username, :email, :status, null)";
       $req  = $this->db->prepare($query);
       $req->bindvalue(':username', $params['username'], PDO::PARAM_STR );
       $req->bindvalue(':email', $params['email'], PDO::PARAM_STR ); 
       $req->bindvalue(':status', true, PDO::PARAM_BOOL );  
       $req->execute();
       return  $this->db->lastInsertId();
    }

    public function update($id, $status)
    {  
       $query  = "UPDATE users SET status = :status WHERE id = :id";
       $req  = $this->db->prepare($query);
       $req->bindvalue(':id', $id, PDO::PARAM_INT);
       $req->bindvalue(':status', $status, PDO::PARAM_BOOL);  
       $req->execute();
       return  true;
    }

    public function findAll($id)
    {
       $query  = "SELECT * FROM users WHERE id != :id";
       $req    = $this->db->prepare($query);
       $req->bindvalue(':id', $id, PDO::PARAM_STR);
       $req->execute();

       $users = [];

      while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

         $user = new User();
         $user->setId($row['id']);
         $user->setUserName($row['username']);
         $user->setEmail($row['email']);
         $user->setStatus($row['status']);
         $user->setCreatedAt($row['createdAt']);
         $users[] = $user->jsonSerialize();
      }

       echo json_encode($users);
    }
}