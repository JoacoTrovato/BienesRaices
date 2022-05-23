<?php include "includes/templates/header.php"; ?> 
    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Texto Entrada Blog"/>
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta unde ipsam illum iste porro quasi harum totam distinctio, accusantium neque nobis placeat animi quidem, eaque, sint nostrum nihil. Earum, neque.</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque distinctio sequi eaque nobis, nam sed deleniti esse? Maiores, ipsa! Excepturi nostrum dolorum fuga iure minus a non velit sint obcaecati? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem officiis recusandae eveniet repellendus ut quo ducimus culpa inventore expedita quod vero aperiam vel, voluptatibus consequatur incidunt in sint earum illum.</p>
            </div>
        </div>
    </main>
    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy"/>
                <h3>Seguridad</h3>
                <p>Dolor dolorum esse alias inventore perferendis expedita. Asperiores repudiandae maiores, repellendus facere atque voluptas fugiat odit adipisci quis iusto dignissimos? Necessitatibus, beatae?</p>
            </div> <!--.icono-->
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy"/>
                <h3>Precio</h3>
                <p>Dolor dolorum esse alias inventore perferendis expedita. Asperiores repudiandae maiores, repellendus facere atque voluptas fugiat odit adipisci quis iusto dignissimos? Necessitatibus, beatae?</p>
            </div> <!--.icono-->
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy"/>
                <h3>A Tiempo</h3>
                <p>Dolor dolorum esse alias inventore perferendis expedita. Asperiores repudiandae maiores, repellendus facere atque voluptas fugiat odit adipisci quis iusto dignissimos? Necessitatibus, beatae?</p>
            </div> <!--.icono-->
        </div> <!--.iconos-nosotros-->
    </section>
    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>
        <p class="copyright">Todos los derechos reservados 2022 &copy;</p>
    </footer>
    <script src="build/js/bundle.min.js"></script>
</body>
</html>