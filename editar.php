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

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT id, titulo, contenido FROM publicaciones WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $publicacion = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];

    $query = "UPDATE publicaciones SET titulo = ?, contenido = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $titulo, $contenido, $id);

    if ($stmt->execute()) {
        echo "Publicación actualizada correctamente.";
        header("Location: rifas.php"); // Redirige a la página principal
    } else {
        echo "Error al actualizar la publicación.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Publicación</title>
    <style>
         body {
            background-color:black;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-color:#DB1800;}
            @media (max-width: 600px) {
    body {
        font-size: 16px;
    }
}

  /* Estilos generales para el formulario */
  form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgb(255, 174, 0);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Estilos para las etiquetas de los campos */
        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        /* Estilos para los campos de entrada */
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        /* Estilos para el botón */
        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .publicacion {
            max-width: 600px;
            margin: 20px auto;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            text-align: center; /* Centrar contenido dentro de cada publicación */
        }

        /* Centrado de imágenes */
        .publicacion img {
            display: block;
            margin: 0 auto; /* Centramos la imagen */
            max-width: 100%; /* La imagen se ajusta al ancho del contenedor */
            height: auto; /* Mantener la proporción de la imagen */
            border-radius: 5px;
        }

        /* Estilo para los títulos */
        .publicacion h2 {
            font-family: Arial, sans-serif; /* Arial para el título */
            font-size: 1.5em;
            color: #333;
            margin-top: 10px;
        }

        /* Estilo para el contenido */
        .publicacion p {
            font-family: Arial, sans-serif; /* Arial para el contenido */
            font-size: 1em;
            color: #666;
            line-height: 1.6;
            text-align: left; /* Alinear el contenido del texto a la izquierda */
        }




        </style>
</head>
<body>
    <h1>Editar Publicación</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $publicacion['id']; ?>">
        <label>Título:</label>
        <input type="text" name="titulo" value="<?php echo htmlspecialchars($publicacion['titulo']); ?>" required><br>
        <label>Contenido:</label>
        <textarea name="contenido" required><?php echo htmlspecialchars($publicacion['contenido']); ?></textarea><br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
