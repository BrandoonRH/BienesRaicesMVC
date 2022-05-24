<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{

    public static function index(Router $router){
        $propiedades = Propiedad::get(3); 
        $inicio = true; 
       $router->render('pages/index', [
           'propiedades' => $propiedades,
           'inicio' => $inicio
       ]);
    }

    public static function nosotros(Router $router){
        $router->render('pages/nosotros');
    }

    public static function propiedades(Router $router){
        $propiedades = Propiedad::get(20); 
        $router->render('pages/propiedades', [
            'propiedades' => $propiedades,
        ]);
    }

    public static function propiedad(Router $router){
      $id = validarRedireccionarGET("/admin"); 
      $propiedad = Propiedad::find($id);
      
      $router->render('pages/propiedad',[
          'propiedad' => $propiedad
      ]);
    }

    public static function blog(Router $router){
        $router->render('pages/blog');
    }
    public static function entrada(Router $router){
        $router->render('pages/entrada');
    }


    public static function contacto(Router $router){
        $mensajeEmail = null;   
        $mensajeContacto = null;
        $respuestas = [
            "nombre" =>'',
            "apellido" =>'',
            "mensaje" =>'',
            "tipo" =>'',
            "precio" =>'',
        ];
       

     if($_SERVER['REQUEST_METHOD'] === 'POST'){
      
        $respuestas = $_POST['contacto'];

        if(!empty($respuestas['contacto'])){
             //creamos una Instancia de PHPMailer
         $mail = new PHPMailer(); 

         //Configuramos Protocolo SMTP
         $mail->isSMTP(); 
         $mail->Host = 'smtp.mailtrap.io';
         $mail->SMTPAuth = true; 
         $mail->Username = 'b598a3f8c600b6'; 
         $mail->Password = 'fe9bb1baefb28f'; 
         $mail->SMTPSecure = 'tls'; 
         $mail->Port = 2525; 

         //Configurar el contenido del email
         $mail->setFrom('admin@bienesraices.com');
         $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
         $mail->Subject = 'Tienes un Nuevo Mensaje'; 

         //Habilitar HTML
         $mail->isHTML(true);
         $mail->CharSet = 'UTF-8'; 

         //Definir Contenido
         $contenido = '<html>';
         $contenido .= '<p>Tienes un Nuevo Mensaje</p>';
         $contenido .= '<p><b>Nombres:</b> ' . $respuestas['nombre']  . '</p>';
         $contenido .= '<p><b>Apellidos:</b> ' . $respuestas['apellido']  . '</p>';

         //Enviar de Forma Condicional algunos Campos
         switch($respuestas['contacto']){
            case 'telefono':
                $contenido .= '<p><b>Eligio ser contactado por Teléfono</b></p>';
                $contenido .= '<p><b>Teléfono:</b> ' . $respuestas['telefono']  . '</p>';
                $contenido .= '<p><b>Fecha Contacto:</b> ' . $respuestas['fecha']  . '</p>';
                $contenido .= '<p><b>Hora Contacto:</b> ' . $respuestas['hora']  . '</p>';

                break; 

            case 'email': 
                $contenido .= '<p><b>Eligio ser contactado por Email</b></p>';
                $contenido .= '<p><b>Email:</b> ' . $respuestas['email']  . '</p>';
                break;     

            default: 
            $contenido .= '<p><b>No se Elígio Ninguna Opción de Contacto</b></p>';
              break;
         }
         $contenido .= '<p><b>Mensaje Usuario:</b> ' . $respuestas['mensaje']  . '</p>';
         $contenido .= '<p><b>Vende o Compra:</b> ' . $respuestas['tipo']  . '</p>';
         $contenido .= '<p><b>Precio o Presupuesto:</b> $'. $respuestas['precio']  . '</p>';
         $contenido  .= '</html>'; 

         $mail->Body = $contenido;
         $mail->AltBody = 'Esto es texto alternativo sin HTML'; 

         //Enviar el Email
         if($mail->send()){
            $mensajeEmail =  "Email Enviado Correctamente"; 
            $respuestas = [
                "nombre" =>'',
                "apellido" =>'',
                "mensaje" =>'',
                "tipo" =>'',
                "precio" =>'',
            ];
         }else{
            $mensajeEmail =  "No se pudo enviar"; 
         }

        }else{
            $mensajeContacto = "Debe seleccionar al menos una opción de contacto"; 
        }
     }

     $router->render('pages/contacto',[
        'mensajeEmail' => $mensajeEmail, 
        'mensajeContacto' => $mensajeContacto,
        'respuestas' => $respuestas
        
     ]);
    }
    
}