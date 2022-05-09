<?php 
namespace Model; 

class Admin extends ActiveRecord{
    protected static $tabla = 'usuarios'; 
    protected static $columnasDB = ['email' ,'password'];
    
    public $id; 
    public $nombre; 
    public $apellido; 
    public $email; 
    public $password; 

    public function __construct($args = [])
    {
        $this->email = $args['email'] ?? null; 
        $this->password = $args['password'] ?? null; 

    }

    public function validar(){
        if(!$this->email){
          self::$errores[] = 'El email es Obligatorio'; 
        } 
        if(!$this->password){
            self::$errores[] = 'El password es Obligatorio'; 
          }
          return self::$errores;
    }

    public function usuarioExiste(){
      //Revisar si el Usuario existe
      $query = "SELECT * FROM ". self::$tabla ." WHERE email = '" . $this->email . "' LIMIT 1";
      $resultado = self::$conexionDB->query($query); 
  
      if(!$resultado->num_rows){
       self::$errores[] = 'El usuario no existe'; 
       return;
      }
      return $resultado;

    }

    public function comprobarPassword($resultado){
      $usuario = $resultado->fetch_object();
      $autenticado = password_verify($this->password, $usuario->password); 
      if(!$autenticado){
        self::$errores[] = 'Password Incorrecto'; 
      }
        return $autenticado; 
    }

    public function autenticarUsuario(){
      session_start(); 
      $_SESSION['usuario'] = $this->email; 
      $_SESSION['login'] = true; 
    
      header('Location: /bienesraicesMVC/public/index.php/admin');
    }






}