<?php
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_mileniumfit";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $conn->real_escape_string($_POST['correo']);
    $contraseña = $_POST['contraseña'];

    // Consulta para obtener el hash de la contraseña del correo proporcionado
    $sql = "SELECT id, nombres, contraseña, rol FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $usuario = $result->fetch_assoc();

        // Verificar la contraseña usando md5 (solo mientras solucionas el problema)
        if (md5($contraseña) === $usuario['contraseña']) {
            // Contraseña correcta, iniciar sesión
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombres'] = $usuario['nombres'];
            $_SESSION['rol'] = $usuario['rol'];
            
            echo "<h2 style='text-align:center; color:orange;'> ¡Bienvenid@ a Mileniumfit!</h2> ";
        } else {
            // Contraseña incorrecta
            echo "<h1 style = 'color:orange; text-align:center'>Contraseña incorrecta.</h1>";
            exit();
        }
    } else {
        // El correo no existe
        echo "<h1 style = 'color:orange; text-align:center;'>Correo no encontrado o incorrecto. </h1>";
        exit();
    }
}
 
$conn->close();




?>









<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Navegación</title>
    <style>
        body {
            background-color:#000;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-color:#DB1800;
       
            
        }
        nav {
    background-color: rgb(255, 178, 0);
    padding: 10px;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: space-around;
}

nav ul li {
    display: inline;
    border-right: 2px solid #000; /* Línea separadora */
}

nav ul li:last-child {
    border-right: none; /* Eliminar la línea en el último ítem */
}

nav ul li a {
    color: #000000;
    text-decoration: none;
    padding: 10px 20px;
    display: inline-block;
}

nav ul li a:hover {
    background-color: #555;
}

/* Ajustes para dispositivos móviles */
@media (max-width: 768px) {
    nav ul {
        flex-direction: column;
        align-items: center;
    }

    nav ul li {
        width: 100%;
        text-align: center;
        border-right: none; /* Quitar la línea separadora en dispositivos pequeños */
        border-bottom: 2px solid #000; /* Agregar línea separadora entre los elementos */
    }

    nav ul li:last-child {
        border-bottom: none; /* Eliminar la línea en el último ítem */
    }

    nav ul li a {
        padding: 10px;
    }
}


        
        p{ color:rgb(255, 178, 0);
            text-align:center;
            font-size:20px;


        }
        h2{color:rgb(255, 178, 0);

        }
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
            background-color: rgb(255, 178, 0);
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

       

       
      
    </style>
</head>
<body>


    <!--menú-->
    <nav>
        <ul>
            <li><a href="rifas.php">Rifas</a></li>
            <li><a href="comprartickets.php">Comprar Tikets</a>
            <li><a href="soporte_tecnico.php">Soporte Técnico</a></li>
            <li><a href="ganadores.php">Ganadores</a></li>
            <?php
        // Verificar si el usuario tiene el rol de administrador
       
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
        ?>
            <li><a href="compradores.php">Compradores</a></li>
            <li><a href="reportes_soporte_tecnico.php">Reportes soporte técnico</a></li>
        <?php
        }
        ?>
            
           
             
        
           
         
        </ul>
    </nav>
  
   









<p>En esta página podrás realizar realizar rifas y sorteos virtuales </p>


  <!-- Verificar si el usuario es administrador (verificado en PHP) -->
  
    <?php if ($_SESSION['rol'] == 'admin'): ?>
        <form action="procesar_publicacion.php" method="POST" enctype="multipart/form-data">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required ><br><br>

            <label for="contenido">Contenido:</label>
            <textarea id="contenido" name="contenido" rows="5" cols="30" required></textarea><br><br>

            <label for="foto">Subir foto:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required><br><br>

            <button type="submit">Publicar</button>
        </form>
       
    <?php else: ?>
        <p>¡Mira las rifas que están disponobles en la sesión de rifas!</p>
    <?php endif; ?>

</body>
</html>




