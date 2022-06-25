<main>
    <h1>Lista de Bienes Raices</h1>
   
    <div class="contenedor">
     <a href="/admin" class="boton boton-verde">Volver..</a>
    </div>
     <h2>Propiedades</h2>
    <div class="contenedor">

       <table class="propiedades">
           <thead>
                <th>Codigo</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
           </thead>
           <tbody><!---Mostramos los Datos-->
           <?php foreach( $propiedades as $propiedad ) : ?>
               <tr> 
                   <!--Id -->
                   <td>
                    <?php echo $propiedad->id ?>
                   </td>
                <!--Titulo -->
                   <td> 
                   <?php echo $propiedad->titulo ?>
                   </td>

                   <!--Imagen -->
                   <td>
                     <img src="/images/<?php echo $propiedad->imagen; ?>" alt="" class="imagen-tabla">
                   </td>

                   <!--Precio -->
                   <td>
                   $ <?php echo $propiedad->precio ?>
                   </td> 

                   <!--Acciones -->
                   <td>

                       <form action="/admin/propiedades/eliminar" method="POST" class="w-100">
                          <input type="hidden" name="id" value=" <?php echo $propiedad->id ?>">
                          <input type="hidden" name="tipo" value="propiedad">
                         <input type="submit" class="boton-rojo-block" value="Eliminar">
                       </form>

                       <a href="/admin/propiedades/actualizar?id= <?php echo $propiedad->id ?>" class="boton-amarillo-block">Actualizar</a>    
                   </td>

               </tr>
               <?php endforeach; ?>
           </tbody>
       </table>
    </div>
</main>