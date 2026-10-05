<?php
$estaLogueado = isset($_SESSION['usuario_id']);
$esOscuro = (isset($_SESSION['usuario_tema']) && $_SESSION['usuario_tema'] === 'oscuro');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - CHISME67</title>
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

<main style="padding: 40px 20px; max-width: 800px; margin: auto;">
    <h2 style="text-align: center; margin-bottom: 30px;">Colaboradores de CHISME67</h2>
    
    <div style="display: flex; flex-direction: column; gap: 20px;">
        <div class="post-card">
            <h3 style="margin: 0 0 10px 0; color: #ff6600 !important;">Xavierity Lemos</h3>
            <p style="margin: 0;"><strong>Cualidades:</strong> Experto en Hardware y fan de Dead Space.</p>
        </div>

        <div class="post-card">
            <h3 style="margin: 0 0 10px 0; color: #ff6600 !important;">Isaacity Ríos</h3>
            <p style="margin: 0;"><strong>Cualidades:</strong> Scrum Master, el guiador experto del Scrum.</p>
        </div>

        <div class="post-card">
            <h3 style="margin: 0 0 10px 0; color: #ff6600 !important;">Agustinity Silva</h3>
            <p style="margin: 0;"><strong>Cualidades:</strong> El mejor trabajador en código e IA; sabe mucho de Brawl Stars y es un experto.</p>
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