<!--PROPIEDADES ADMINISTRADOR-->
<main>

    <h1>Administrador de Bienes Raices</h1>

    <?php 
    if($resultado){
        $mensaje = mostrarNotificacion(intval($resultado)); 
        if($mensaje){  ?>
            <p class="alerta exito"><?php echo s($mensaje);  ?></p>
       <?php } 
    }?>

    <div class="contenedor-enlaces-admin">
        <a href="/bienesraicesMVC/public/index.php/admin/propiedades/crear" class="boton boton-verde">Crear Propiedad</a>

        <a href="/bienesraicesMVC/public/index.php/admin/propiedades/ver" class="boton boton-verde">Ver Propiedades</a>

        <a href="#" class="boton boton-verde">Actualizar Propiedad</a>
        
        <a href="#" class="boton boton-verde">Eliminar Propiedad</a>
    </div>

</main>


<!--VENDEDORES ADMINISTRADOR-->
<main>

    <h1>Administrador de Vendedores</h1>

    <div class="contenedor-enlaces-admin">
        <a href="/bienesraicesMVC/public/index.php/admin/vendedores/crear" class="boton boton-verde">Registrar Vendedor</a>

        <a href="/bienesraicesMVC/public/index.php/admin/vendedores/ver" class="boton boton-verde">Ver Vendedores</a>

        <a href="#" class="boton boton-verde">Actualizar Vendedor</a>
        
        <a href="#" class="boton boton-verde">Eliminar Vendedor</a>
    </div>

</main>
