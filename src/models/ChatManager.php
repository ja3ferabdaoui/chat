<?php

include_once('config.php');
require_once(ROOT . '/config/database.php');

class ChatManager
{
    private $db;

    public function __construct()
    {
          $this->db = new Database();
    }


    public function save($params)
    {
       $query  = "INSERT INTO chat (fromId, toId, text, createdAt) VALUES (:fromId, :toId, :text, null)";
       $req  = $this->db->prepare($query);
       $req->bindvalue(':fromId', $params['fromId'], PDO::PARAM_INT );
       $req->bindvalue(':toId', $params['toId'], PDO::PARAM_INT ); 
       $req->bindvalue(':text', $params['text'], PDO::PARAM_STR);  
       $req->execute();
       return  true;
    }

    public function findAll($params)
    {  
       $query  = "SELECT * FROM chat WHERE (toId = :toId AND fromId = :fromId) or (toId = :fromId AND fromId = :toId)";
       $req    = $this->db->prepare($query);
       $req->bindvalue(':fromId', $params['fromId'], PDO::PARAM_INT);
       $req->bindvalue(':toId', $params['toId'], PDO::PARAM_INT);
       $req->execute();
       $messages = [];
      
      while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

         $chat = new Chat();
         $chat->setId($row['id']);
         $chat->setFromId($row['fromId']);
         $chat->setToId($row['toId']);
         $chat->setText($row['text']);
         $chat->setCreatedAt($row['createdAt']);
         $messages[] = $chat->jsonSerialize();
      }

       echo json_encode($messages);
    }
}