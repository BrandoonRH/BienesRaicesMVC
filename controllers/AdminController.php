<?php
namespace Controllers;
use MVC\Router; 
use Model\Propiedad;

class AdminController{

    public static function index(Router $router){
        $resultado = $_GET['resultado'] ?? null;

        $router->render('admin/admin', [
            'resultado' => $resultado
            
        ]);

     }















}