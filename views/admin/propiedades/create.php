<main class="contenedor seccion">
    <h1>Registrar Propiedad</h1>

    <div class="contenedor" style="margin-bottom: 15px">
     <a href="/admin" class="boton boton-verde">Volver..</a>
    </div>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
           <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    
    <form action="/admin/propiedades/crear" class="formulario" method="POST" enctype="multipart/form-data" >
        <?php include __DIR__ . '/formulario.php';  ?>

        <input type="submit" value="Registrar Propiedad" class="boton boton-verde">
    </form>
</main>