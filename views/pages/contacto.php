<main class="contenedor seccion">
        <h1>Contacto</h1>

    <?php if($mensajeEmail){ ?>
        <p class="alerta exito"> <?php echo s($mensajeEmail);?> </p>
        <?php }?>
    <?php if($mensajeContacto){ ?>
        <p class="alerta error"> <?php echo s($mensajeContacto);?> </p>
        <?php }?>    

    <div class="contenedor" style="margin-bottom: 15px">
     <a href="/bienesraicesMVC/public/index.php" class="boton boton-verde">Volver..</a>
    </div>

        <picture>
            <source srcset="/bienesraicesMVC/public/build/img/destacada3.webp" type="image/webp">
            <source srcset="/bienesraicesMVC/public/build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="/bienesraicesMVC/public/build/img/destacada3.jpg" alt="Imagen Contacto">
        </picture>

        <h2>Llene el formulario de Contacto</h2>

        <form class="formulario" action="/bienesraicesMVC/public/index.php/contacto" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre(s)</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" value="<?php echo $respuestas['nombre'];?>" required>

                <label for="nombre">Apellido(s)</label>
                <input type="text" placeholder="Tu Apellido" id="apellido" name="contacto[apellido]" value="<?php echo $respuestas['apellido'];?>" required>

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="contacto[mensaje]" required><?php echo $respuestas['mensaje'];?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vende o Compra:</label>
                <select id="opciones" name="contacto[tipo]"  required>
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option <?php echo $respuestas['tipo'] === "Compra" ? 'selected' : ''; ?>  value="Compra">Compra</option>
                    <option <?php echo $respuestas['tipo'] === "Vende" ? 'selected' : ''; ?>  value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" min="1" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[precio]" value="<?php echo $respuestas['precio'];?>" required>

            </fieldset>

            <fieldset>
                <legend>Información de Contacto</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input  type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" >

                    <label for="contactar-email">E-mail</label>
                    <input  type="radio" value="email" id="contactar-email" name="contacto[contacto]" >
                </div>

                <div id="contacto"></div>

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>