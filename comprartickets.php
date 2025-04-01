<!DOCTYPE html>
<html lang="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
h2{text-align:center;
    font-family:serif;
    font-size:30px;
    color:#ffd900;

}
h4{text-align:center;
    font-family:serif;
    font-size:27px;
    color:#ffd900;

}
p{text-align:center;
    font-family:serif;
    font-size:27px;
    color:#ffd900;


}

button{background-color:#F5BC27;
       color:black;
       border:none;
       border-radius:20px;
       font: size 16px;
       cursor:pointer;
       transition: background-color 0.3s;
       margin:0;
       padding: 12px 24px;
}
button:hover {
            background-color:#5B00F0;
        }
        button:active {
            background-color: #000877;
        }
        .diseño_boton {
            display: flex; /* Flexbox para alinear elementos */
            justify-content: center; /* Centramos los botones horizontalmente */
            gap: 10px; /* Espacio entre botones */
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
input[type="email"],
input[type="tel"],
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
@media (max-width: 600px) {
    body {
        font-size: 16px;
    }
}

  img{width:16px;
      height:20px;
  }     

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compar tickets</title>
</head>
<body>
<a href="iniciar.php">
    <img src="imagenes/flecha.png" alt="">
</a>
<h1> ¡Compra el ticket que deseas!</h1>

<h2>Tickets</h2>
<!--selección de botones-->
<script>
function seleccionar(valor) {
    document.getElementById("ticket").value = valor; // Asigna el valor del ticket seleccionado al campo de ticket
}
</script>

<div class="diseño_boton">
<button onclick = "seleccionar('+3')">+3</button>
<button onclick = "seleccionar('+10')">+10</button>
<button onclick = "seleccionar('+20')">+20</button>
<button onclick = "seleccionar('+50')">+50</button>
<button onclick = "seleccionar('+100')">+100</button>
    </div>

<h4>Una vez realizada la transferencia rellene este formulario: </h4>
<form action ="procesar_compradores.php" method ="POST" enctype="multipart/form-data"> 
<label for="nombre">Nombre </label>
<input type="text" id="nombre" name ="nombre"><br><br>
<label for="correo">Correo</label>
<input type="email" id="correo" name="correo"><br><br>
<label for="numero">Número de celular</label>
<input type="tel" id="numero" name="numero"><br><br>
<label for="ticket">Ticket </label>
<input type="text" id="ticket" name="ticket">
<label for="foto">Subir compobante de pago</label>
<input type="file" id="foto" name="foto" accept="image/*" required><br><br>
<input type="submit" value="Enviar formulario">
</form>

</body>
</html>
