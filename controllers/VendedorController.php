<?php 
namespace Controllers;
use MVC\Router; 
use Model\Vendedor;

class VendedorController{

    public static function index(Router $router){
        $vendedores = Vendedor::all(); 
         $router->render('admin/vendedores/show', [
             'vendedores' => $vendedores
         ]);
     }

     public static function crear(Router $router){

        $vendedor = new Vendedor(); 
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
            $vendedor = new Vendedor($_POST['vendedor']); 
            $errores = $vendedor->validar(); 
            if(empty($errores)){
                $vendedor->guardar();   
            }
        }
       
         $router->render('admin/vendedores/create', [
            'vendedor' => $vendedor, 
            'errores' => $errores, 
         ]);
     }

     public static function actualizar(Router $router){
        $errores = Vendedor::getErrores();
        $id = validarRedireccionarGET("/admin");    
      $vendedor = Vendedor::find($id);

            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                $args = $_POST['vendedor']; 
                $vendedor->sincronizar($args); 
                $errores = $vendedor->validar(); 
            
                
                if(empty($errores)){
                
                $vendedor->guardar(); 
                }
            }
        $router->render('admin/vendedores/update', [
           'vendedor' => $vendedor, 
           'errores' => $errores,

        ]);
    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
    
            $id = validarRedireccionarPOST("/admin"); 
          
            if($id){
              $tipo = $_POST['tipo']; 
              if(validarTipoContenido($tipo)){
                if($tipo === 'vendedor'){
                   $vendedorEliminar = Vendedor::find($id); 
                   $vendedorEliminar->eliminar(); 
                }
              }
           }  
         }
    }
     
     















}//Fin de la Clase