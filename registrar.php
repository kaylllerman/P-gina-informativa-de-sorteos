<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_mileniumfit";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir y procesar datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $conn->real_escape_string($_POST['nombres']);
    $apellidos = $conn->real_escape_string($_POST['apellidos']);
    $correo = $conn->real_escape_string($_POST['correo']);
    $contraseña = $_POST['contraseña'];
    $contraseña_hash = md5($contraseña);
    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuarios (nombres, apellidos, correo, contraseña) VALUES ('$nombres', '$apellidos', '$correo', '$contraseña_hash')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1 style='color:orange; text-align:center; font-family:arial; margin-top:50px'>Registro exitoso</h1>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>
