<?php
session_start();

/**
 * Class ChatController
 * 
 */
class ChatController 
{   
    private $model;

    public function __construct()
    {
        $this->model = new ChatManager();
    }

    public function newMessage($params)
    {
        $this->model->save($params);
    }

    public function getAll($id)
    {     
         $this->model->findAll($id);
    }

    public function chat($id)
    {   
        $view = New View('chat');
        $view->render(['id'=>$id]);
    }

}