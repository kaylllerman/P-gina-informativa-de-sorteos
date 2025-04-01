<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Milenium.css">
    <title>soporte técnico</title>
   <style>
   
     @media (max-width: 600px) {
    body {
        font-size: 16px;
    }
}
body{background-color:black;
}

h1{text-align:center;
    font-family:Arial;
    font-size:35px;
   color: #F55C27;
}

p{text-align:center;
    font-family:serif;
    font-size:27px;
    color:#ffd900;


}

    /* Estilos de formulario */
form {
    background-color: rgb(255, 174, 0); /* Fondo naranja para el formulario */
    padding: 20px; /* Espaciado interno */
    border-radius: 8px; /* Bordes redondeados */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
    width: 90%; /* Ancho del formulario en unidades relativas */
    max-width: 400px; /* Ancho máximo en pantallas grandes */
    margin: 0 auto 30px; /* Centrado y espacio inferior entre formularios */
    transform: translateY(30px);
}

/* Media query para pantallas pequeñas */
@media (max-width: 480px) {
    form {
        width: 88%; /* Ancho completo en dispositivos móviles */
        padding: 15px; /* Menos espaciado interno */
        box-shadow: none; /* Sin sombra para simplificar en móviles */
       
    }
}


/* Estilo para etiquetas */
label {
    display: block; /* Cada etiqueta en una nueva línea */
    margin-bottom: 5px; /* Espacio entre etiqueta y campo de entrada */
    color: #333;
}

/* Estilos de entradas */


input[type="text"],
textarea,
input[type="file"] {
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
@media (max-width: 600px) {
    body {
        font-size: 16px;
    }
}

  img{width: 16px;
      height: 50px;
      position:absolute;
      top: 0;
      left: 8px;
      width: 16px;
      height: 20px;
      z-index: 1000;
      margin-top:50px;
  }     
 
    </style>
</head>
<body>
<a href="iniciar.php">
    <img src="imagenes/flecha.png" alt="">
</a>
    <h1>Soporte técnico</h1>
    
 <p>Si notas alguna falla ténica en la página, ¡escríbela en el siguiente formulario para analizarla y corregirla!</p>

<form action="procesar_reportes.php" enctype="multipart/form-data" method="POST">
    <label for="titulo">Título</label>
    <input type="text" id="titulo" name="titulo" required><br><br>
    <label for="descripcion">Descripción de la falla</label>
    <textarea id="descripcion" name="descripcion" rows="5" cols="30" required></textarea><br><br>
    <label for="foto">Foto de la falla técnica</label>
    <input type="file" id="foto" name="foto" accept="image/*"required><br><br>
    <input type="submit" value="Enviar reporte">
</form>



</body>
</html>
