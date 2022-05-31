<?php
    require "includes/funciones.php";
    incluirTemplate("header");
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta Frente al Bosque</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loaging="lazy" src="build/img/destacada.jpg" alt="Anuncio"/>
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc"/>
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento"/>
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio"/>
                    <p>4</p>
                </li>
            </ul> 
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero possimus dolorem a ex blanditiis fugiat sunt aspernatur, voluptatibus ullam architecto error ut cum natus doloribus, saepe sit aut maxime quae!</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero possimus dolorem a ex blanditiis fugiat sunt aspernatur, voluptatibus ullam architecto error ut cum natus doloribus, saepe sit aut maxime quae!</p>
        </div>
    </main>
<?php
    incluirTemplate("footer");
?>   