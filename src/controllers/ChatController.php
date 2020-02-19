<?php
session_start();

/**
 * Class ChatController
 * 
 */
class ChatController 
{   
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new ChatManager();
        $this->view = New View('chat');
    }

    public function newMessage($params)
    {   
        if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] != $params['toId'])) {

            $params['fromId'] = $_SESSION['user_id'];
            $this->model->save($params);
        }else{
            $this->view->redirect('login');
        }
    }

    public function getAll($params)
    {    
        if (isset($_SESSION['user_id'])) {

            $params['fromId'] = $_SESSION['user_id'];
            $this->model->findAll($params);
        }else{
            $this->view->redirect('login');
        }
    }

    public function chat($id)
    {   
        $this->view->render($id);
    }

}