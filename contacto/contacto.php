<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $mensaje = trim($_POST['mensaje']);
    $fecha_completa = date("H:i:s | Y-m-d");
    $fecha_dia = date("Y-m-d");

    $texto_registro = "======= MENSAJE $fecha_completa =======\n";
    $texto_registro .= "Nombre: " . $nombre . "\n";
    $texto_registro .= "Email: " . $email . "\n";
    $texto_registro .= "Mensaje: " . $mensaje . "\n";
    $texto_registro .= "---------------------------------------------\n\n";

    // ACTUALIZAR RUTAAAAAAAAAA!!!!!!!!! <<<<<<<<<-----------------------------------------------------------
    $archivo_txt = "C:\Users\practicasfp\Desktop\mensajes $fecha_dia.txt";

    file_put_contents($archivo_txt, $texto_registro, FILE_APPEND | LOCK_EX);

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

            <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <div class="mensaje-exito">
                ¡Mensaje enviado correctamente!
            </div>
            <?php endif; ?>

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

                <a href="/Projecte_WEB2/index.html" class="btn-volver">Volver a Inicio</a>
            </form>
        </div>

    </main>
</body>
<footer>
    <div class="footer-cont">
        <p>&copy;2026 Juan Moya Clavell. All rights reserved.</p>
    </div>
</footer>
</html>