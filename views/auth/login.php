<main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

       <?php foreach($errores as $error): ?>
         <div class="alerta error">
             <?php echo $error; ?>
         </div>
        <?php endforeach; ?>


        <form class="formulario formulario-login" method="POST" action="/bienesraicesMVC/public/index.php/login" >

            <fieldset class="fieldset-login">
                <legend>Email y Contrseña</legend>

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email" name="email" >

                <label for="password">Contraseña</label>
                <input type="password" placeholder="Tu password" id="password" name="password"  >

            </fieldset>

           
              <input type="submit" class="boton boton-verde btn-enviar" value="Iniciar Sesión">
           

        </form>

    </main>