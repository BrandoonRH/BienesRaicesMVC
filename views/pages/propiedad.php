<main class="contenedor seccion contenido-centrado">

<div class="contenedor" style="margin-bottom: 15px">
     <a href="/propiedades" class="boton boton-verde">Volver..</a>
</div>
        <h1 data-cy="titulo-propiedad"><?php echo $propiedad->titulo ?></h1>

        <img loading="lazy" src="/public/imagenesBienesRaices/<?php echo $propiedad->imagen; ?>" alt="imagen de la propiedad">
     

        <div class="resumen-propiedad">
            <p class="precio">$ <?php echo $propiedad->precio ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="/build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad->wc ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="/build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento ?></p>
                </li>
                <li>
                    <img class="icono"  loading="lazy" src="/build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad->habitaciones ?></p>
                </li>
            </ul>

            <p>
             <?php echo $propiedad->descripcion ?>
            </p>

        </div>
    </main>