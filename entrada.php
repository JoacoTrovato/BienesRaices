<?php
    require "includes/funciones.php";
    incluirTemplate("header");
?> 
    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loaging="lazy" src="build/img/destacada2.jpg" alt="Anuncio"/>
        </picture>
        <p class="informacion-meta">Escrito el: <span>17/05/2022</span> por: <span>Admin</span></p>
        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero possimus dolorem a ex blanditiis fugiat sunt aspernatur, voluptatibus ullam architecto error ut cum natus doloribus, saepe sit aut maxime quae!</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero possimus dolorem a ex blanditiis fugiat sunt aspernatur, voluptatibus ullam architecto error ut cum natus doloribus, saepe sit aut maxime quae!</p>
        </div>
    </main>
<?php
    incluirTemplate("footer");
?>    