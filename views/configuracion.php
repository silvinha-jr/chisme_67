<?php
$estaLogueado = isset($_SESSION['usuario_id']);

if (!$estaLogueado) {
    header('Location: index.php?action=inicio');
    exit;
}

$apodoActual = $_SESSION['usuario_apodo'] ?? $_SESSION['usuario_nombre'] ?? '';
$esOscuro = (isset($_SESSION['usuario_tema']) && $_SESSION['usuario_tema'] === 'oscuro');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración - CHISME67</title>
    <link rel="stylesheet" href="public/css/style.css">
<?php if ($esOscuro): ?>
<style>
    body {
        background-color: #121212 !important;
        color: #ffffff !important;
    }

    .navbar {
        background-color: #121212 !important;
    }

    .nav-buttons .btn-nav {
        color: #bb86fc !important;
    }

    .post-card, .login-card {
        background-color: #1e1e1e !important;
        color: #ffffff !important;
        border: 1px solid #333 !important;
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
            <img src="public/img/<?php echo $esOscuro ? 'image1-dark.png' : 'image1.png'; ?>" alt="CHISME67 Logo" style="height: 50px;">
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

<main style="padding: 40px 20px; max-width: 650px; margin: auto;">
    <div class="post-card" style="padding: 30px; text-align: left;">
        <h2 style="color: #4a148c; margin-top: 0; text-align: center;">Configuración de la Cuenta</h2>
        <hr style="border: 0; border-top: 1px solid #eee; margin-bottom: 25px;">
        
        <form action="index.php?action=guardar_configuracion" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            <div>
                <label style="font-weight: bold; display: block; margin-bottom: 10px;">Elige un tema de fondo:</label>
                <div style="display: flex; gap: 10px;">
                    <label style="cursor: pointer; padding: 10px 15px; border-radius: 6px; background: #4a148c; color: white; font-weight: bold; display: flex; align-items: center; gap: 8px;">
                        <input type="radio" name="tema" value="claro" <?php echo ($_SESSION['usuario_tema'] ?? 'claro') === 'claro' ? 'checked' : ''; ?>> Blanco (Claro)
                    </label>
                    <label style="cursor: pointer; padding: 10px 15px; border-radius: 6px; background: #333; color: white; font-weight: bold; display: flex; align-items: center; gap: 8px;">
                        <input type="radio" name="tema" value="oscuro" <?php echo ($_SESSION['usuario_tema'] ?? 'claro') === 'oscuro' ? 'checked' : ''; ?>> Negro (Oscuro)
                    </label>
                </div>
            </div>

            <div>
                <label style="font-weight: bold; display: block; margin-bottom: 8px;">Nombre de Perfil (Apodo):</label>
                <input type="text" name="apodo" value="<?php echo htmlspecialchars($apodoActual); ?>" required style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc; box-sizing: border-box;">
            </div>

            <button type="submit" class="btn-submit" style="padding: 12px; background: #4a148c; color: white; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; margin-top: 10px;">Guardar Cambios</button>
        </form>

        <div style="margin-top: 20px;">
            <a href="index.php?action=logout" style="display: block; width: 100%; text-align: center; padding: 12px; background: #e53935; color: white; border-radius: 6px; font-weight: bold; text-decoration: none; box-sizing: border-box;">Cerrar Sesión</a>
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