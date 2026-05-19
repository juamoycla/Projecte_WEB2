<?php
// 1. Comprobamos si el usuario ha pulsado el botón de enviar
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2. Recogemos los datos de los inputs (y limpiamos espacios)
    $nombre  = trim($_POST['nombre']);
    $email   = trim($_POST['email']);
    $mensaje = trim($_POST['mensaje']);
    $fecha   = date("Y-m-d H:i:s"); // Captura la hora exacta del envío

    // 3. Diseñamos cómo se va a ver el texto dentro del archivo .txt
    $texto_registro = "=========================================\n";
    $texto_registro .= "NUEVO MENSAJE DE CONTACTO\n";
    $texto_registro .= "Fecha: " . $fecha . "\n";
    $texto_registro .= "Nombre: " . $nombre . "\n";
    $texto_registro .= "Email: " . $email . "\n";
    $texto_registro .= "Mensaje: " . $mensaje . "\n";
    $texto_registro .= "=========================================\n\n";

    // 4. Nombre del archivo donde se guardará (se creará automáticamente)
    $archivo_txt = "mensajes_contacto.txt";

    /* 5. Guardamos los datos.
       FILE_APPEND hace que los mensajes nuevos se añadan abajo del todo
       en lugar de borrar los anteriores.
    */
    file_put_contents($archivo_txt, $texto_registro, FILE_APPEND | LOCK_EX);

    // 6. Opcional: Redirigir al usuario para que el formulario se limpie al enviar
    header("Location: contacto.php?status=success");
    exit();
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css"/>
    <title>2&4wheels | Contacto</title>
</head>
<body>
<main class="contenedor-main">

    <div class="tarjeta-form">
        <h1>Contacta con Nosotros</h1>
        <p>Escribenos y te responderemos lo antes posible.</p>
        <form method="POST" action="#">
            <div class="grupo">
                <label for="nombre">Nombre completo:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="grupo">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="grupo">
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="4" maxlength="300" required></textarea>
            </div>

            <button type="submit" class="btn-enviar">Enviar Mensaje</button>
        </form>
    </div>

</main>
</body>
</html>