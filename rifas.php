<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_mileniumfit";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener las publicaciones
$sql = "SELECT id, titulo, contenido, foto, fecha FROM publicaciones ORDER BY fecha DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Publicaciones de Rifas</title>
    <style>
        /* Estilos básicos para las publicaciones */
        .publicacion {
            border: 1px solid black;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #101010;
        }
        .publicacion img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 10px;
        }
        .publicacion h2 {
            margin-top: 0;
            color:orange;
            text-align:center;
        }
       
        h1{text-align:center;
           font-family:Arial;
           font-size:35px;
           color: #F55C27;
            
        }
        .publicacion p{
            text-align: center;
            font-family: verdana;
            color: #ff53cf;
        }
        body{background-color:black;

        }
        .devolver{width: 16px;
                  height:20px;
        }
    </style>
</head>
<body>
<a href="iniciar.php">
    <img src="imagenes/flecha.png" alt="" class="devolver">
</a>
    <h1>Publicaciones de Rifas</h1>

    <?php
     session_start();


// Mostrar las publicaciones si existen
if ($result->num_rows > 0) {
    while ($publicacion = $result->fetch_assoc()) {
        echo "<div class='publicacion'>";
        echo "<h2>" . htmlspecialchars($publicacion['titulo']) . "</h2>";
        echo "<p>" . htmlspecialchars($publicacion['contenido']) . "</p>";
        
        // Verificar si existe una imagen antes de mostrarla
        if (!empty($publicacion['foto'])) {
            echo "<img src='" . htmlspecialchars($publicacion['foto']) . "' alt='Imagen de la publicación'>";
        }

        // Verificar si existe la fecha antes de mostrarla
        if (isset($publicacion['fecha']) && !empty($publicacion['fecha'])) {
            $fecha_actual = new DateTime(); // Fecha y hora actuales
            $fecha_publicacion = new DateTime($publicacion['fecha']);

            // Comparar si la fecha de publicación es hoy
            if ($fecha_actual->format('Y-m-d') == $fecha_publicacion->format('Y-m-d')) {
                echo "<small style='color:#ffd900;'>Publicado: hoy</small>";
            } else {
                echo "<small style='color:#ffd900;'>Publicado el: " . $fecha_publicacion->format('d-m-Y') . "</small>";
            }
        } else {
            echo "<small>Fecha no disponible</small>";
        }
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
    echo "<div style='margin-top: 10px; text-align: center;'>";
    echo "<a href='editar.php?id=" . $publicacion['id'] . "' style='color: #00ff00; margin-right: 10px;'>Editar</a>";
    echo "<a href='eliminar.php?id=" . $publicacion['id'] . "' style='color: #ff0000;' onclick='return confirm(\"¿Estás seguro de eliminar esta publicación?\")'>Eliminar</a>";
    
    echo "<a href='asignar_ganador.php?id=" . $publicacion['id'] . "&titulo=" . urlencode($publicacion['titulo']) . "&contenido=" . urlencode($publicacion['contenido']) . "' style='color: yellow;;'>Asignar Ganador</a>";
    echo "</div>";
    }    


        echo "</div>";
    }
} else {
    echo "<p>No hay publicaciones disponibles.</p>";
}

// Cerrar conexión
$conn->close();
?>
</body>
</html>











