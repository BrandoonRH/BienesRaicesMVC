
<main>
    <h1>Lista de Vendedores</h1>

    <div class="contenedor">
   <a href="/admin" class="boton boton-verde">Volver..</a>
   </div>

   <h2>Vendedores</h2>
    <div class="contenedor">

       <table class="propiedades">
           <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>telefono</th>
                <th>Correo</th>
                <th>Foto</th>
           </thead>
           <tbody><!---Mostramos los Datos-->
           <?php foreach( $vendedores as $vendedor ) : ?>
               <tr> 
                   <!--Id -->
                   <td>
                    <?php echo $vendedor->id ?>
                   </td>
                <!--Nombre -->
                   <td> 
                   <?php echo $vendedor->nombre ?>
                   </td>

                   <!--Apellido-->
                   <td>
                   <?php echo $vendedor->apellido ?>
                   </td>

                   <!--Telefono-->
                   <td>
                    <?php echo $vendedor->telefono ?>
                   </td> 
                   
                   <!--Correo-->
                   <td>
                    <?php echo $vendedor->correo ?>
                   </td> 
                    <!--Imagen-->
                    <td>
                    <img src="/images/<?php echo $vendedor->imagen; ?>" alt="" class="imagen-tabla">
                   </td> 


                   <!--Acciones -->
                   <td>

                       <form action="/admin/vendedores/eliminar" method="POST" class="w-100">
                          <input type="hidden" name="id" value=" <?php echo $vendedor->id ?>">
                          <input type="hidden" name="tipo" value="vendedor">
                         <input type="submit" class="boton-rojo-block" value="Eliminar">
                       </form>

                       <a href="/admin/vendedores/actualizar?id= <?php echo $vendedor->id ?>" class="boton-amarillo-block">Actualizar</a>    
                   </td>

               </tr>
               <?php endforeach; ?>
           </tbody>
       </table>
    </div>
   
</main>