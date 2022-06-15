<?php
    // Base de Datos
    require "../../includes/config/database.php";
    $db = conectarDB();

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        $titulo = $_POST["titulo"];
        $precio = $_POST["precio"];
        $descripcion = $_POST["descripcion"];
        $habitaciones = $_POST["habitaciones"];
        $wc = $_POST["wc"];
        $estacionamiento = $_POST["estacionamiento"];
        $vendedorId = $_POST["vendedorId"];

        // Insertar en la base de datos
        $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedorId)
        VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedorId')";
    
        echo $query;
        $FKfix = "SET FOREIGN_KEY_CHECKS=0;"; 
        mysqli_query($db, $FKfix);

        try {
            //code...
            $resultado = mysqli_query($db, $query);

            if($resultado) {
            echo "Insertado Correctamente";
            }
            echo "<pre>";
            var_dump($resultado);
            echo "</pre>";
        } catch (\Throwable $th) {
            //throw $th;
            echo "No se conectó correctamente";
        }
        
    }

    require "../../includes/funciones.php";
    incluirTemplate("header");
?> 
    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>
        <form class="formulario" method="POST" action="/admin/propiedades/crear.php">
            <fieldset>
                <legend>Información General</legend>
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" placeholder="Título Propiedad">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" placeholder="Precio Propiedad">
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" placeholder="Imagen">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"></textarea>
            </fieldset>
            <fieldset>
                <legend>Información General</legend>
                <label for="habitaciones">Habitaciones:</label>
                <input type="text" name="habitaciones" id="habitaciones" min="1" max="15" placeholder="Ej: 3">
                <label for="wc">Baños:</label>
                <input type="number" name="wc" id="wc" min="1" max="15" placeholder="Ej: 3">
                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" name="estacionamiento" id="estacionamiento" min="1" max="15" placeholder="Ej: 3">
            </fieldset>
            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedorId">
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