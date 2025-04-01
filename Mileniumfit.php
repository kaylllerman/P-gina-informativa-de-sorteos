<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    /* Estilos generales del cuerpo */
body {
    font-family: Arial, sans-serif;
    background-color: #000000; /* Color de fondo suave */
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center; /* Centra el contenido horizontalmente */
    justify-content: center; /* Centra el contenido verticalmente */
    font-size: 1rem;
}

/* Estilo para el título principal */
h1 {
    color: #f55c27;
    margin-bottom: 30px; /* Reduce el espacio en móviles */
    font-size: 1.8em; /* Tamaño adaptado */
    text-align: center;
}

/* Estilo para los subtítulos */
h2 {
    color: #ffd900;
    margin-bottom: 10px;
    text-align: center;
}

/* Estilos de formulario */
form {
    background-color: rgb(255, 174, 0); /* Fondo naranja para el formulario */
    padding: 20px; /* Espaciado interno */
    border-radius: 8px; /* Bordes redondeados */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
    width: 90%; /* Ancho del formulario en unidades relativas */
    max-width: 800px; /* Ancho máximo en pantallas grandes */
    margin: 0 auto 500px; /* Centrado y espacio inferior entre formularios */
    margin-bottom: 15px;
}

/* Media query para pantallas pequeñas */
@media (max-width: 480px) {
    form {
        width: 88%; /* Ancho completo en dispositivos móviles */
        padding: 15px; /* Menos espaciado interno */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); /* Sombra reducida en móviles */
       
    }   
    h1 {
        font-size: 1.6em; /* Tamaño de fuente del título en móviles */
        margin-bottom: 20px;
    }
    h2 {
        font-size: 1.2em;
    }
}

/* Estilo para etiquetas */
label {
    display: block; /* Cada etiqueta en una nueva línea */
    margin-bottom: 5px; /* Espacio entre etiqueta y campo de entrada */
    color: #333;
}

/* Estilos de entradas */
input[type="email"],
input[type="password"],
input[type="text"] {
    width: 100%; /* Ocupa todo el ancho del formulario */
    padding: 10px; /* Espaciado interno */
    border: 1px solid #ccc; /* Borde gris claro */
    border-radius: 4px; /* Bordes redondeados */
    margin-bottom: 15px; /* Espacio entre campos */
    box-sizing: border-box; /* Incluye padding y borde en el ancho total */
}

/* Estilo para el botón de enviar */
input[type="submit"] {
    background-color: #1d1c1cfa; /* Color de fondo azul */
    color: white; /* Color del texto */
    padding: 10px; /* Espaciado interno */
    border: none; /* Sin borde */
    border-radius: 4px; /* Bordes redondeados */
    cursor: pointer; /* Cursor de mano al pasar */
    width: 100%; /* Ocupa todo el ancho del formulario */
    font-size: 16px; /* Tamaño de fuente */
}

/* Efecto al pasar el ratón sobre el botón */
input[type="submit"]:hover {
    background-color: #0056b3; /* Color de fondo más oscuro al pasar el ratón */
}





        </style>
    <title>Milenium fit</title>
</head>
<body>
    <!--formulario para iniciar sesion-->
    <h1> ¡Milenium Fit!</h1>
    <h2> Iniciar sesión </h2>
    <form action="Iniciar.php" method = "post">
    <label for ="correo">Correo electrónico </label>
    <input type = "email" id = "correo" name = "correo" required><br><br>
    <label for ="contraseña" >Contraseña</label>
    <input type ="password" id = "contraseña" name = "contraseña" required><br><br>
    <input type = "submit" value = "Ingresar"><br><br><br>
    </form>
    <!--formulario para registrarse-->
    <h2>Registrarse</h2>
    <form action = "registrar.php" method = "post"> 
    <label for = "nombres">Nombres </label>
    <input type ="text" id ="nombres" name ="nombres" required><br><br>
    <label for = "apellidos"> Apellidos</label>
    <input type ="text" id = "apellidos" name = "apellidos" required><br><br>
    <label for = "correo">Correo</label>
    <input type = "email" id = "correo" name = "correo"><br><br>
    <label for = "contraseña">Contraseña<label>
    <input type = "password" id = "contraseña" name = "contraseña" required>
    <input type = "submit" value = "registrarse">
    <form>


</body>
</html>
