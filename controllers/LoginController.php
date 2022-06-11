<?php 
namespace Controllers; 
use MVC\Router; 
use Model\Admin; 

class LoginController{

    public static function login(Router $router){
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
           $auth = new Admin($_POST); 
           $errores = $auth->validar(); 

           if(empty($errores)){
               //Verificar si el Usuario Existe 
               $resultadoUsario = $auth->usuarioExiste(); 
               if(!$resultadoUsario){
                  $errores = Admin::getErrores();
               }else{
                    //Verificar el Password
                $autenticado =  $auth->comprobarPassword($resultadoUsario);    
                    if($autenticado){
                        //Autenticar al Usuario
                        $auth->autenticarUsuario(); 
                    }else{
                        //password Incorrecto
                        $errores = Admin::getErrores();
                    }
               }
           }
        }

       $router->render('auth/login', [
        'errores' => $errores
       ]);
     
    }

    public static function logout(){
        session_start(); 
        $_SESSION = []; 
        header('Location: /');
     }

}