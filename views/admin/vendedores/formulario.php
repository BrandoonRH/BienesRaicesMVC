<fieldset>
  
        <legend>Información General Vendedor</legend>

        <label for="nombre">Nombre:</label>
        <input type="text" name="vendedor[nombre]" id="nombre" placeholder="Nombre del Vendedor(a)" value="<?php echo s($vendedor->nombre);  ?>">
        
        
        <label for="apellido">Apellido:</label>
        <input type="text" name="vendedor[apellido]" id="apellido" placeholder="Apellido del Vendedor(a)" value="<?php echo s($vendedor->apellido);  ?>">

        <label for="telefono">Telefono:</label>
        <input type="tel" maxlength="10" name="vendedor[telefono]" id="telefono" placeholder="3300310032...." value="<?php echo s($vendedor->telefono);  ?>" >
         
        <label for="correo">E-mail: </label>
        <input type="email" name="vendedor[correo]" id="correo" placeholder="Correo del Vendedor(a)" value="<?php echo s($vendedor->correo);  ?>">

        <label for="imagen">Imagen:</label>
        <input type="file" name="vendedor[imagen]" id="imagen" accept="image/jpeg, image/png">
        <?php if($vendedor->imagen){ ?>
         
         <div style="width: 20rem;">
         <img src="/images/<?php echo $vendedor->imagen ?>" alt="" class="imagen-tabla">
         </div>
         
        <?php } ?>    
</fieldset>