<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="heading-login">Iniciar Sesión</h1>

       <?php foreach($errores as $error): ?>
         <div data-cy="alerta-login" class="alerta error"><?php echo $error; ?></div>
        <?php endforeach; ?>


        <form data-cy="formulario-login" class="formulario formulario-login" method="POST" action="/login" >

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