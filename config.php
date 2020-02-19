<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

   class ChatAutoload
   {   
     public static function start()
     {
        spl_autoload_register([__CLASS__, 'autoload']);
        
        $root = $_SERVER['DOCUMENT_ROOT'];
       
        $host = $_SERVER['HTTP_HOST'];
        
        define('ROOT', $root);
        define('HOST', 'http://'.$host);
        
        define('CONTROLERS', ROOT.'/src/controllers/');
        define('MODELS', ROOT.'/src/models/');
        define('VIEWS', ROOT.'/src/views/');
        define('ROUTES', ROOT.'/routes/');
        define('ASSETS', HOST.'/assets/');
     }
    
    public static function autoload($class)
    {
        if(file_exists(MODELS.$class . '.php')){

          include_once(MODELS.$class . '.php');
        }else if(file_exists(CONTROLERS.$class . '.php')){
       
            include_once(CONTROLERS.$class . '.php');
        }else if(file_exists(ROUTES.$class . '.php')){

            include_once(ROUTES.$class . '.php');
        }
    }
  }








