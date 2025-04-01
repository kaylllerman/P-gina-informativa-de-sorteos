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

// Verificar si se proporcionó un ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID no válido");
}

$id = intval($_GET['id']);

// Consultar los detalles de la publicación
$sql = "SELECT titulo, contenido, foto FROM publicaciones WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Publicación no encontrada");
}

$publicacion = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignar Ganador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #101010;
            text-align: center;
            color: rgb(255,154,0);
            padding: 20px;
        }
        form {
            max-width: 480px;
            background-color: #1c1c1c;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
            text-align: left;
        }
        input, textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #333;
        }
        input[type="submit"] {
            background-color: orange;
            color: black;
            font-weight: bold;
            cursor: pointer;
        }
        @media (max-width: 600px) {
    body {
        font-size: 16px;
    }
}   
.devolver{width: 18px;
          height:20px;
          float:left;
        }
    </style>
</head>
<body>
<a href="iniciar.php">
    <img src="imagenes/flecha.png" alt="devolver" class="devolver">
</a>
    <h1>Asignar Ganador</h1>
    <form action="ganadores.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($publicacion['titulo']); ?>" readonly>
        
        <label for="contenido">Contenido:</label>
        <textarea name="contenido" id="contenido" readonly><?php echo htmlspecialchars($publicacion['contenido']); ?></textarea>
        
        <?php if (!empty($publicacion['foto'])): ?>
            
        <?php endif; ?>
        
        <label for="nombre">Nombre del ganador:</label>
        <input type="text" name="nombre" id="nombre" required>
        
        <label for="correo">Correo del ganador:</label>
        <input type="email" name="correo" id="correo" required>
        
        <input type="submit" value="Publicar ganador">
    </form>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
