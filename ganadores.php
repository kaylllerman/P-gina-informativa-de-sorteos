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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $foto = isset($_POST['foto']) && !empty($_POST['foto']) ? $_POST['foto'] : 'ruta/default.png'; // Ruta de una imagen predeterminada

    // Insertar los datos en la tabla de ganadores
    $sql = "INSERT INTO ganadores (publicacion_id, titulo, contenido, nombre, correo, foto) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssss", $id, $titulo, $contenido, $nombre, $correo, $foto);

    if ($stmt->execute()) {
        echo "<p style='color: yellow;'>¡Mira los ganadores!</p>";
    } else {
        echo "<p style='color: red;'>Error al registrar el ganador: " . $conn->error . "</p>";
    }

    $stmt->close();
}


// Consultar los ganadores registrados
$sql = "SELECT titulo, contenido, nombre, correo, foto FROM ganadores ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ganadores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #101010;
            color:rgb(255, 77, 0);
            text-align: center;
            padding: 20px;
        }
        .ganador {
            border: 1px solid #333;
            padding: 15px;
            margin: 10px auto;
            max-width: 500px;
            background-color: #1c1c1c;
            border-radius: 10px;
        }
        .ganador h2 {
            color: #F55D00;
        }
        
        .ganador img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .devolver{width: 18px;
          height:20px;
          float:left;
        }
        .trofeo{width: 30px;
                height: 35px;
                right: 40px;

        }
    </style>
</head>
<body>
<a href="iniciar.php">
    <img src="imagenes/flecha.png" alt="devolver" class="devolver">
</a>
   <a><img src="imagenes/taza.png" class="trofeo"></a>
    <h1>Ganadores</h1>
    
    <?php
    // Mostrar los ganadores si existen
    if ($result->num_rows > 0) {
        while ($ganador = $result->fetch_assoc()) {
            echo "<div class='ganador'>";
            echo "<h2>" . htmlspecialchars($ganador['titulo']) . "</h2>";
            echo "<p style='color:#EBDB00;'>" . htmlspecialchars($ganador['contenido']) . "</p>";
            echo "<p  style='color:#00E8EB';><strong>Ganador:</strong> " . htmlspecialchars($ganador['nombre']) . "</p>";
            echo "<p style='color:#F500ED;'><strong>Correo:</strong> " . htmlspecialchars($ganador['correo']) . "</p>";
            if (!empty($ganador['foto'])) {
                echo "<img src='" . htmlspecialchars($ganador['foto']) . "' alt=''>";
            }
            echo "</div>";
        }
    } else {
        echo "<p>No hay ganadores registrados aún.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
