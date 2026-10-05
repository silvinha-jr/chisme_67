<?php
$estaLogueado = isset($_SESSION['usuario_id']);

if (!$estaLogueado) {
    header('Location: index.php?action=inicio');
    exit;
}

$nombreReal = $_SESSION['usuario_nombre'] ?? 'No especificado';
$apodo = $_SESSION['usuario_apodo'] ?? 'Sin apodo';
$emailUsuario = $_SESSION['usuario_email'] ?? 'No especificado';
$fechaNacimiento = $_SESSION['usuario_fecha_nacimiento'] ?? 'No especificada';
$esOscuro = (isset($_SESSION['usuario_tema']) && $_SESSION['usuario_tema'] === 'oscuro');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - CHISME67</title>
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

<main style="padding: 40px 20px; max-width: 500px; margin: auto;">
    <div class="post-card" style="padding: 30px; text-align: left;">
        <h2 style="color: #4a148c; margin-top: 0; text-align: center;">Mi Cuenta</h2>
        <hr style="border: 0; border-top: 1px solid #eee; margin-bottom: 20px;">
        
        <p><strong>Apodo:</strong> <?php echo htmlspecialchars($apodo); ?></p>
        <p><strong>Nombre real:</strong> <?php echo htmlspecialchars($nombreReal); ?></p>
        <p><strong>Correo electrónico:</strong> <?php echo htmlspecialchars($emailUsuario); ?></p>
        <p><strong>Fecha de nacimiento:</strong> <?php echo htmlspecialchars($fechaNacimiento); ?></p>
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