<?php
    // Base de Datos
    require "../../includes/config/database.php";
    $db = conectarDB();

    require "../../includes/funciones.php";
    incluirTemplate("header");
?> 
    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>
        <form class="formulario">
            <fieldset>
                <legend>Información General</legend>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" placeholder="Título Propiedad">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" placeholder="Precio Propiedad">
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" placeholder="Imagen">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion"></textarea>
            </fieldset>
            <fieldset>
                <legend>Información General</legend>
                <label for="habitaciones">Habitaciones:</label>
                <input type="text" id="habitaciones" min="1" max="15" placeholder="Ej: 3">
                <label for="baños">Baños:</label>
                <input type="number" id="baños" min="1" max="15" placeholder="Ej: 3">
                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" min="1" max="15" placeholder="Ej: 3">
            </fieldset>
            <fieldset>
                <legend>Vendedor</legend>
                <select>
                    <option value="1">Joaquín</option>
                    <option value="2">Majo</option>
                </select>
            </fieldset>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>
<?php
    incluirTemplate("footer");
?> 