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
$sql = "SELECT  id, nombre, correo, numero, ticket, foto, fecha FROM compradores ORDER BY fecha DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Compradores</title>
    <style>
        /* Estilos básicos para las publicaciones */
        .compradores {
            border: 1px solid black;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #101010;
        }
        .compradores img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 10px;
        }
        .compradores h2 {
            margin-top: 0;
            color:orange;
            text-align:center;
        }
       
        h1{text-align:center;
           font-family:Arial;
           font-size:35px;
           color: #F55C27;
            
        }
        .compradores p{
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
    <h1>Compradores</h1>

    <?php
     session_start();


// Mostrar las publicaciones si existen
if ($result->num_rows > 0) {
    while ($compradores = $result->fetch_assoc()) {
        echo "<div class='compradores'>";
        echo "<h2>Nombre: " . htmlspecialchars($compradores['nombre']) . "</h2>";
        echo "<p style = 'color:#3ACEF0'> Correo: " . htmlspecialchars($compradores['correo']) . "</p>";
        echo "<p>Número: " . htmlspecialchars($compradores['numero']) . "</p>";
        echo "<p>Ticket: " . htmlspecialchars($compradores['ticket']) . "</p>";
        // Verificar si existe una imagen antes de mostrarla
        if (!empty($compradores['foto'])) {
            echo "<img src='" . htmlspecialchars($compradores['foto']) . "' alt='Imagen del comprobante '>";
        }

        // Verificar si existe la fecha antes de mostrarla
        if (isset($compradores['fecha']) && !empty($compradores['fecha'])) {
            $fecha_actual = new DateTime(); // Fecha y hora actuales
            $fecha_compradores = new DateTime($compradores['fecha']);

            // Comparar si la fecha de publicación es hoy
            if ($fecha_actual->format('Y-m-d') == $fecha_compradores->format('Y-m-d')) {
                echo "<small style='color:#ffd900;'>enviado: hoy</small>";
            } else {
                echo "<small style='color:#ffd900;'>enviado el: " . $fecha_compradores->format('d-m-Y') . "</small>";
            }
        } else {
            echo "<small>Fecha no disponible</small>";
        }
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
   
    echo "</div>";
    }    


        echo "</div>";
    }
} else {
    echo "<p>No hay Comprobantes por el momento.</p>";
}

// Cerrar conexión
$conn->close();
?>
</body>
</html>











