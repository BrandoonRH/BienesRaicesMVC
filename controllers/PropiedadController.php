<?php
namespace Controllers;
use MVC\Router; 
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {

    public static function index(Router $router){
       $propiedades = Propiedad::all(); 
        $router->render('admin/propiedades/show', [
            'propiedades' => $propiedades, 
        
        ]);
    }

    public static function crear(Router $router){
        $propiedad = new Propiedad; 
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();
       
        //Método POST para Guardar Registro 
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Creamos la Instancia 
            $propiedad = new Propiedad($_POST['propiedad']); 

            //Generar nombre unico para las imagenes 
            $nameImages = md5( uniqid( rand(), true ) ) . ".jpg";
            
            //Setear Imagen 
            //Realizar un resize a la Imagen con Intervention 
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600); 
                $propiedad->setImagen($nameImages);
            }

            //Validar
            $errores = $propiedad->validar(); 
            
                if(empty($errores)){
                //Crear la Carpeta para subir las imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES); 
                }
                //Guardar la Imagen enn el Servidor 
                $image->save(CARPETA_IMAGENES . $nameImages);
                //Guardamos los Datos con la instacian 
                $propiedad->guardar();   
            }
        }

        $router->render('admin/propiedades/create', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores, 
            'errores' => $errores, 
        ]);
    }

    public static function actualizar(Router $router){
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();
        $id = validarRedireccionarGET("/admin"); 
        $propiedad = Propiedad::find($id); 

        //Método POST para Actualizar Registro 
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $args = $_POST['propiedad']; 
            $propiedad->sincronizar($args); 
            $errores = $propiedad->validar(); 
            $nameImages = md5( uniqid( rand(), true ) ) . ".jpg";
        
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600); 
                $propiedad->setImagen($nameImages);
            }
        
            if(empty($errores)){
        
                if($_FILES['propiedad']['tmp_name']['imagen']){
                    $image->save(CARPETA_IMAGENES . $nameImages);
                }
                
              $propiedad->guardar(); 
            }
        }

        $router->render('admin/propiedades/update', [
            'propiedad' => $propiedad,
            'errores' => $errores, 
            'vendedores' => $vendedores

        ]);
    }
        
    public static function eliminar(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
    
            $id = validarRedireccionarPOST("/admin"); 
          
            if($id){
              $tipo = $_POST['tipo']; 
              if(validarTipoContenido($tipo)){
                if($tipo === 'propiedad'){
                   $propiedadEliminar = Propiedad::find($id); 
                   $propiedadEliminar->eliminar(); 
                }
              }
           }  
         }
    }
    

    public static function actualizarView(Router $router){
        $router->render('admin/propiedades/updateView');
    }
    





}