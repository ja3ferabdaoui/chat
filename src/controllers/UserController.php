<?php
session_start();

/**
 * Class UserController
 * 
 */
class UserController 
{   

    private $model;
    private $view;

    public function __construct()
    {
         $this->model = new UserManager();
         $this->view  = new View('message');
    }

    public function index()
    {   

        if (!isset($_SESSION['user_id'])) {

           $this->view->redirect('/login');
        }else{

           $this->view->render();
        }
       
    }

    public function login($params = null)
    {
    
        $view = new View('login');

        $username = trim($params['username']);
        $email    = trim($params['email']);

        if($email){
           
            $currentUser = $this->model->findByEmail($email);
            if($currentUser['id']){
                $this->model->update($currentUser['id'], true);
                $_SESSION['user_id'] = $currentUser['id'];
            }else{

                $currentUserId = $this->model->save($params);
                $_SESSION['user_id'] = $currentUserId;
            } 

            $view->redirect('message');
         }else{

            $view->render();
        }

    }
    public function message($params = null)
    {   

        if (isset($_SESSION['user_id'])) {

            $currentUser =  $this->model->findById($_SESSION['user_id']);
            $this->view->render(['currentUser'=>$currentUser]);
        }else{

            $this->view->redirect('login');
        }
    }
    
    public function getAll()
    {  
         $this->model->findAll($_SESSION['user_id']);
    }
    
    public function logout()
    {   
        $this->model->update($_SESSION['user_id'], false);
        session_destroy();
        $view = new View();
        $view->redirect('login');
        exit();
    }


}