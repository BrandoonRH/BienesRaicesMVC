
<?php 
   if(!isset($_SESSION)){
     session_start();

   }
   
   $auth = $_SESSION['login'] ?? false;

   if(!isset($inicio)){
    $inicio = false; 
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices </title>
    <link rel="stylesheet" href="/bienesraicesMVC/public/build/css/app.css">
</head>
<body>
    
    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienesraicesMVC/public/index.php/">
                    <img src="/bienesraicesMVC/public/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/bienesraicesMVC/public/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/bienesraicesMVC/public/build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="/bienesraicesMVC/public/index.php/nosotros">Nosotros</a>
                        <a href="/bienesraicesMVC/public/index.php/propiedades">Propiedades</a>
                        <a href="/bienesraicesMVC/public/index.php/blog">Blog</a>
                        <a href="/bienesraicesMVC/public/index.php/contacto">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/bienesraicesMVC/public/index.php/admin">Panel Admin</a>
                            <a href="/bienesraicesMVC/public/index.php/logout">Cerrar Sesión</a>
                          <?php else:  ?>
                            <a href="/bienesraicesMVC/public/index.php/login">Iniciar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
                
            </div> <!--.barra-->

           <?php echo $inicio ? "<h1><h1>Venta de Casas en Guadalajara Jal.</h1>" : ""; ?>
        </div>
    </header>

<?php echo $contenido; ?>


    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/bienesraicesMVC/public/index.php/nosotros">Nosotros</a>
                <a href="/bienesraicesMVC/public/index.php/propiedades">Propiedades</a>
                <a href="/bienesraicesMVC/public/index.php/blog">Blog</a>
                <a href="/bienesraicesMVC/public/index.php/contacto">Contacto</a>
            </nav>
        </div>
        

        <p class="copyright">Todos los derechos Reservados <?php echo date('Y')?> &copy;</p>
    </footer>

    <script src="/bienesraicesMVC/public/build/js/bundle.min.js"></script>
</body>
</html>