<main class="contenedor seccion">
    <h1>Actuallizar Propiedad</h1>

    <div class="contenedor" style="margin-bottom: 15px">
     <a href="/bienesraicesMVC/public/index.php/admin   " class="boton boton-verde">Volver..</a>
    </div>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
           <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    
    <form action="" class="formulario" method="POST" enctype="multipart/form-data" >
        <?php include __DIR__ . '/formulario.php';  ?>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>