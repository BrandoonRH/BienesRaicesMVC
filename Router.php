<?php 
namespace MVC; 

class Router{
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fnc){
        $this->rutasGET[$url] = $fnc; 
    }

    public function post($url, $fnc){
        $this->rutasPOST[$url] = $fnc; 
    }
    
    public function comprobarRutas(){
        session_start(); 
        $auth = $_SESSION['login'] ?? null; 

        //Arreglo de rutas Protegidas
       $rutas_protegidas = [
            '/admin',
            '/admin/propiedades/ver',
            '/admin/propiedades/crear', 
            '/admin/propiedades/actualizar', 
            '/admin/propiedades/eliminar', 
            '/admin/vendedores/ver', 
            '/admin/vendedores/crear', 
            '/admin/vendedores/actualizar', 
            '/admin/vendedores/eliminar'
        ]; 


        $urlActual = $_SERVER['PATH_INFO'] ?? '/'; 
        $metodo = $_SERVER['REQUEST_METHOD']; 

        if($metodo == 'GET'){
           $fnc = $this->rutasGET[$urlActual] ?? null; 
        }else{
            
            $fnc = $this->rutasPOST[$urlActual] ?? null; 
        }
        //Proteger las rutas 
        if(in_array($urlActual, $rutas_protegidas) && !$auth){
            header('Location: /');
        }

        if($fnc){
          
            call_user_func($fnc, $this);
        }else{
          echo "Pagina No encontrada"; 
        }

    }

    public function render($view, $datos = []){

        foreach($datos as $key => $value){
          $$key = $value;
        }

     ob_start(); 
     include_once __DIR__ . "/views/$view.php";
     $contenido = ob_get_clean(); 
     include_once __DIR__ . "/views/layout.php"; 

    }

}
   
?>