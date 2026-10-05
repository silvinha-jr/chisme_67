<?php
$estaLogueado = isset($_SESSION['usuario_id']);

if (!$estaLogueado) {
    header('Location: index.php?action=inicio');
    exit;
}

$esOscuro = (isset($_SESSION['usuario_tema']) && $_SESSION['usuario_tema'] === 'oscuro');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones - CHISME67</title>
    <link rel="stylesheet" href="public/css/style.css">
<?php if ($esOscuro): ?>
<style>
    body, .navbar {
        background-color: #121212 !important;
        color: #ffffff !important;
    }

    .nav-buttons .btn-nav {
        color: #bb86fc !important;
    }

    /* Tarjetas de contenido */
    .post-card, .login-card {
        background-color: #1e1e1e !important;
        color: #ffffff !important;
        border: 1px solid #333333 !important;
    }

    .post-card p {
        color: #e0e0e0 !important;
    }
</style>
<?php endif; ?>
</head>
<body class="<?php echo $esOscuro ? 'dark-mode' : ''; ?>">

<header class="navbar">
<div class="logo-box">
    <a href="index.php?action=inicio">
        <img src="public/img/<?php echo $esOscuro ? 'image1-dark.png' : 'image1.png'; ?>" alt="CHISME67 Logo">
    </a>
</div>
    <div class="search-box">
        <form action="#"><input type="text" placeholder="Buscar en Chisme67..."></form>
    </div>
    <nav class="nav-buttons">
        <a href="index.php?action=inicio" class="btn btn-home">Inicio</a>
        <a href="index.php?action=sobre_nosotros" class="btn btn-nav">Sobre Nosotros</a>
        <a href="index.php?action=perfil" class="btn btn-nav">Perfil</a>
        <a href="index.php?action=configuracion" class="btn btn-nav">Configuración</a>
        <a href="index.php?action=notificaciones" class="btn btn-nav">Notificaciones</a>
    </nav>
</header>

<main style="padding: 40px 20px; max-width: 600px; margin: auto;">
    <h2 style="text-align: center; margin-bottom: 25px;">Notificaciones</h2>
    
    <div style="display: flex; flex-direction: column; gap: 15px;">
        <div class="post-card" style="padding: 15px; border-left: 5px solid #bb86fc !important;">
            <p style="margin: 0;"><strong>Xavierity Lemos</strong> reaccionó a tu chisme.</p>
            <span style="font-size: 12px; color: #aaa;">Hace 10 minutos</span>
        </div>

        <div class="post-card" style="padding: 15px; border-left: 5px solid #ff6600 !important;">
            <p style="margin: 0;"><strong>Isaacity Ríos</strong> comentó en una publicación que sigues.</p>
            <span style="font-size: 12px; color: #aaa;">Hace 1 hora</span>
        </div>

        <div class="post-card" style="padding: 15px; border-left: 5px solid #bb86fc !important;">
            <p style="margin: 0;">¡Bienvenido a <strong>CHISME67</strong>! Gracias por unirte a nuestra plataforma ! (Las notificaciones que esta viendo son un ejemplo de como se va a llegar a ver en el futuro. ATT: Silva).</p>
            <span style="font-size: 12px; color: #aaa;">Ayer</span>
        </div>
    </div>
</main>

<footer>
    <div class="footer-links">
        <a href="#">Términos y condiciones</a> | 
        <a href="#">Política de privacidad</a> | 
        <a href="#">Política de cookies</a> | 
        <a href="#">Reportar un problema</a> | 
        <a href="#">Soporte técnico</a>
    </div>
    <p>&copy; 2026 Nuvis. Todos los derechos reservados.</p>
</footer>

</body>
</html>