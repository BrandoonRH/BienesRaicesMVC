<?php 
namespace Controllers;
use MVC\Router; 
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

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
            $nameImage = md5( uniqid( rand(), true ) ) . ".jpg";

            if($_FILES['vendedor']['tmp_name']['imagen']){
                $image = Image::make($_FILES['vendedor']['tmp_name']['imagen'])->fit(800,600); 
                $vendedor->setImagen($nameImage);
            }

            $errores = $vendedor->validar(); 

            if(empty($errores)){
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES); 
                }
                $image->save(CARPETA_IMAGENES . $nameImage);
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
                $nameImage = md5( uniqid( rand(), true ) ) . ".jpg";
                if($_FILES['vendedor']['tmp_name']['imagen']){
                    $image = Image::make($_FILES['vendedor']['tmp_name']['imagen'])->fit(800,600); 
                    $vendedor->setImagenVendedor($nameImage);
                }
                
                if(empty($errores)){
                    if($_FILES['vendedor']['tmp_name']['imagen']){
                        $image->save(CARPETA_IMAGENES . $nameImage);
                    }
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