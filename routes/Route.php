<?php 

/**
 * Class Route
 * 
 * create routes
 */
class Route
{  
   private $request;

   private $routes = [''=>['controller'=>'UserController','method'=>'index'],
    'message'=>['controller'=>'UserController','method'=>'message'],
    'login'=>['controller'=>'UserController','method'=>'login'],
    'users'=>['controller'=>'UserController','method'=>'getAll'],
    'new'=>['controller'=>'ChatController','method'=>'newMessage'],
    'logout'=>['controller'=>'UserController','method'=>'logout'],
    'chat'=>['controller'=>'ChatController','method'=>'chat'],
    'messages'=>['controller'=>'ChatController','method'=>'getAll']
   ] ;

   public function __construct($request)
   {
       $this->request = $request;
   }

   public function getRoute()
   {  
       $route = $this->request ;
       $requests = explode('/', $route);
       
       return $requests[0];
   }

   public function getParams()
   {  

      $params = null;
   
      $requests = explode('/' , $this->request);
      unset($requests[0]);
      // extract get params
      for ($i = 1; $i < count($requests) ; $i++) { 

          $params[$requests[$i]] = $requests[$i + 1];
          $i++; 
      }
      // exteact post params
      if($_POST){
          foreach ($_POST as $key => $value) {
              $params[$key] = $value ;
          }
      }
      
      return $params;
   }

   public function renderController()
   {   
       $route  = $this->getRoute();
       $params = $this->getParams();
     
    
       if(key_exists($route, $this->routes)){
           
          $controller = $this->routes[$route]['controller'];
          $method = $this->routes[$route]['method'];
          $curController = new $controller;
          $curController->$method($params);

       }elseif(!isset($_SESSION['user_id'])){

           header("Location:" . '/login');
           exit;
           
       }
   }
}