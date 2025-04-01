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
$sql = "SELECT  titulo, descripcion, foto, fecha FROM reportes ORDER BY fecha DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes de soporte técnico</title>
    <style>
        /* Estilos básicos para las publicaciones */
        .reporte {
            border: 1px solid black;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #101010;
        }
        .reporte img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 10px;
        }
        .reporte h2 {
            margin-top: 0;
            color:orange;
            text-align:center;
        }
       
        h1{text-align:center;
           font-family:Arial;
           font-size:35px;
           color: #F55C27;
            
        }
        .reporte p{
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
    <h1>Reportes de soporte técnico</h1>

    <?php
     session_start();


// Mostrar las publicaciones si existen
if ($result->num_rows > 0) {
    while ($reporte = $result->fetch_assoc()) {
        echo "<div class='reporte'>";
        echo "<h2>" . htmlspecialchars($reporte['titulo']) . "</h2>";
        echo "<p>" . htmlspecialchars($reporte['descripcion']) . "</p>";
        
        // Verificar si existe una imagen antes de mostrarla
        if (!empty($reporte['foto'])) {
            echo "<img src='" . htmlspecialchars($reporte['foto']) . "' alt='Imagen de la publicación'>";
        }

        // Verificar si existe la fecha antes de mostrarla
        if (isset($reporte['fecha']) && !empty($reporte['fecha'])) {
            $fecha_actual = new DateTime(); // Fecha y hora actuales
            $fecha_reporte = new DateTime($reporte['fecha']);

            // Comparar si la fecha de publicación es hoy
            if ($fecha_actual->format('Y-m-d') == $fecha_reporte->format('Y-m-d')) {
                echo "<small style='color:#ffd900;'>Publicado: hoy</small>";
            } else {
                echo "<small style='color:#ffd900 font-align:center;'>Publicado el: " . $fecha_reporte->format('d-m-Y') . "</small>";
            }
        } else {
            echo "<small>Fecha no disponible</small>";
        }
        


        echo "</div>";
    }
} else {
    echo "<p>No hay reportes disponibles.</p>";
}

// Cerrar conexión
$conn->close();
?>
</body>
</html>











