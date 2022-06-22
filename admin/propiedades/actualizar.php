<?php
    // Base de Datos
    require "../../includes/config/database.php";
    $db = conectarDB();

    // Validar la URL por ID válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }

    // Obtener los datos de la propiedad
    $consulta = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    // Consultar para obtener los vendedores    
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensaje de errores   
    $errores = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedorId'];
    $imagenPropiedad = $propiedad['imagen'];

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";

        $titulo = mysqli_real_escape_string( $db,  $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db,  $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db,  $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string( $db,  $_POST['habitaciones'] );
        $wc = mysqli_real_escape_string( $db,  $_POST['wc'] );
        $estacionamiento = mysqli_real_escape_string( $db,  $_POST['estacionamiento'] );
        $vendedorId = mysqli_real_escape_string( $db,  $_POST['vendedorId'] );
        $creado = date('Y/m/d');

        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        if(!$titulo) {
            $errores[] = "Debes añadir un título";
        }
        if(!$precio) {
            $errores[] = "Debes añadir el precio";
        }
        if(strlen($descripcion) < 50) {
            $errores[] = "Debes añadir una descripción y debe tener más de 50 caracteres";
        }
        if(!$habitaciones) {
            $errores[] = "Debes añadir el número de habitaciones";
        }
        if(!$wc) {
            $errores[] = "Debes añadir el número de baños";
        }
        if(!$estacionamiento) {
            $errores[] = "Debes añadir el número de estacionamientos";
        }
        if(!$vendedorId) {
            $errores[] = "Debes seleccionar un vendedor";
        }

        // Validar por tamaño (10MB máximo)
        $medida = 1000 * 10000;

        if($imagen["size"] > $medida) {
            $errores[] = "La imagen es muy pesada";
        }

        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

        // Revisar que el array de errores esté vacío   
        if(empty($errores)) {
            
            if(!is_dir($carpetaImagenes)) {
                // Crear carpeta
                $carpetaImagenes = "../../imagenes/";

                if(!is_dir($carpetaImagenes)) {
                    mkdir($carpetaImagenes);
                }

                $nombreImagen = "";

                /** SUBIDA DE ARCHIVOS **/
                if($imagen["name"]) {
                    // Eliminar la imagen previa
                    unlink($carpetaImagenes . $propiedad["imagen"]);
                
                    // Generar un nombre único
                    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

                    // Subir la imagen
                    move_uploaded_file($imagen["tmp_name"], $carpetaImagenes . $nombreImagen);
                } else {
                    $nombreImagen = $propiedad["imagen"];
                }
            }

            // Insertar en la base de datos
            $query = "UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', IMAGEN = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorId = ${vendedorId} WHERE id = ${id}";
            
            //echo $query;
            $FKfix = "SET FOREIGN_KEY_CHECKS=0;"; 
            mysqli_query($db, $FKfix);

            try {
                //code...
                $resultado = mysqli_query($db, $query);

                if($resultado) {
                // echo "Insertado Correctamente";
                    
                // Redireccionando al usuario
                    header("location: /admin?resultado=2");
                }
                // echo "<pre>";
                // var_dump($resultado);
                // echo "</pre>";
            } catch (\Throwable $th) {
                //throw $th;
                echo "No se conectó correctamente";
            }
        }  
    }

    require "../../includes/funciones.php";
    incluirTemplate("header");
?> 
    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>
        <?php foreach($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <form class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>
                <label for="titulo">Título:</label>
                <input 
                    type="text" 
                    name="titulo" 
                    id="titulo" 
                    placeholder="Título Propiedad" 
                    value="<?php echo $titulo; ?>">
                <label for="precio">Precio:</label>
                <input 
                    type="number" 
                    name="precio" 
                    id="precio" 
                    placeholder="Precio Propiedad" 
                    value="<?php echo $precio; ?>">
                <label for="imagen">Imagen:</label>
                <input 
                    type="file"
                    id="imagen" 
                    accept="image/jpeg, image/png" 
                    placeholder="Imagen"
                    name="imagen">
                <img src="/imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small">
                <label for="descripcion">Descripción:</label>
                <textarea 
                    id="descripcion" 
                    name="descripcion"><?php echo $descripcion; ?>
                </textarea>
            </fieldset>
            <fieldset>
                <legend>Información General</legend>
                <label for="habitaciones">Habitaciones:</label>
                <input 
                    type="text" 
                    name="habitaciones" 
                    id="habitaciones" 
                    min="1" 
                    max="15" 
                    placeholder="Ej: 3" 
                    value="<?php echo $habitaciones; ?>">
                <label for="wc">Baños:</label>
                <input 
                    type="number" 
                    name="wc" 
                    id="wc" 
                    min="1" 
                    max="15" 
                    placeholder="Ej: 3" 
                    value="<?php echo $wc; ?>">
                <label for="estacionamiento">Estacionamiento:</label>
                <input
                    type="number" 
                    name="estacionamiento" 
                    id="estacionamiento" 
                    min="1" 
                    max="15" 
                    placeholder="Ej: 3" 
                    value="<?php echo $estacionamiento; ?>">
            </fieldset>
            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedorId">
                    <option value="">-- Seleccione --</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>">
                        <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
                        <?php endwhile; ?>
                </select>
            </fieldset>
            <input 
                type="submit" 
                value="Actualizar Propiedad" 
                class="boton boton-verde">
        </form>
    </main>
<?php
    incluirTemplate("footer");
?> 