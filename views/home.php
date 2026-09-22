<?php
require_once 'models/Publicacion.php';

$estaLogueado = isset($_SESSION['usuario_id']);
$publicaciones = Publicacion::obtenerTodas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHISME67</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

    <!-- Overlay Único de Autenticación -->
    <div id="authOverlay" class="auth-overlay <?php echo $estaLogueado ? 'hidden' : ''; ?>">
        
        <!-- Tarjeta de Registro -->
        <div id="registerCard" class="login-card">
            <h2>Crear Cuenta en CHISME67</h2>
            <p>Regístrate para ver todos los chismes y publicaciones.</p>
            
            <form action="index.php?action=register" method="POST">
                <input type="text" name="nombre_completo" placeholder="Nombre completo" required>
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button type="submit" class="btn-submit">Registrarse</button>
            </form>

            <p style="margin-top: 15px; font-size: 13px;">
                ¿Ya tienes una cuenta? <a href="#" id="showLoginLink" style="color: #4a148c; font-weight: bold; text-decoration: none;">Inicia Sesión</a>
            </p>
        </div>

        <!-- Tarjeta de Inicio de Sesión -->
        <div id="loginCard" class="login-card hidden">
            <h2>Bienvenido a CHISME67</h2>
            <p>Ingresa tus datos para acceder a la plataforma.</p>
            
            <form action="index.php?action=login" method="POST">
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button type="submit" class="btn-submit">Entrar</button>
            </form>

            <p style="margin-top: 15px; font-size: 13px;">
                ¿No tienes cuenta? <a href="#" id="showRegisterLink" style="color: #4a148c; font-weight: bold; text-decoration: none;">Regístrate</a>
            </p>
        </div>

    </div>

<!-- Modal para Crear Publicación -->
<div id="createOverlay" class="create-overlay hidden" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(0,0,0,0.6); display: flex; justify-content: center; align-items: center; z-index: 99999;">
    <div class="login-card">
        <h2>Publicar Chisme</h2>
        <p>¿Qué chisme quieres contar hoy?</p>
        
        <form action="index.php?action=crear_publicacion" method="POST">
            <textarea name="contenido" placeholder="Escribe tu chisme aquí..." required style="width: 100%; height: 100px; border-radius: 8px; padding: 10px; border: 1px solid #ccc; font-family: inherit; resize: none; box-sizing: border-box;"></textarea>
            <div style="display: flex; gap: 10px; margin-top: 15px;">
                <button type="submit" class="btn-submit" style="flex: 1;">Publicar</button>
                <button type="button" id="closeCreateBtn" class="btn-submit" style="background: #888; flex: 1;">Cancelar</button>
            </div>
        </form>
    </div>
</div>

    <!-- Barra de Navegación -->
    <header class="navbar">
        <div class="logo-box">
            <a href="index.php">
                <img src="public/img/image1.png" alt="CHISME67 Logo" style="height: 50px;">
            </a>
        </div>
        <div class="search-box">
            <form action="#">
                <input type="text" placeholder="Buscar en Chisme67...">
            </form>
        </div>
        <nav class="nav-buttons">
            <a href="index.php" class="btn btn-home">Inicio</a>
            <button id="openCreateBtn" class="btn btn-create">+ Crear</button>
            
            <?php if ($estaLogueado): ?>
                <a href="index.php?action=logout" class="btn btn-login" style="text-decoration: none;">Cerrar Sesión</a>
            <?php else: ?>
                <button id="navAuthBtn" class="btn btn-login">Registrarse</button>
            <?php endif; ?>
        </nav>
    </header>

    <!-- Feed Principal -->
    <main style="padding: 20px; max-width: 600px; margin: auto;">
        <h3>Feed de Chismes</h3>
        
        <?php if (!empty($publicaciones)): ?>
            <?php foreach ($publicaciones as $pub): ?>
                <div class="post-card">
                    <strong><?php echo htmlspecialchars($pub['nombre_completo']); ?>:</strong>
                    <p style="margin: 5px 0 0 0; white-space: pre-wrap; word-break: break-word;"><?php echo htmlspecialchars($pub['contenido']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="color: #666;">No hay chismes publicados aún. ¡Sé el primero!</p>
        <?php endif; ?>
    </main>

    <!-- Script de Control Visual -->
    <script>
        const authOverlay = document.getElementById('authOverlay');
        const registerCard = document.getElementById('registerCard');
        const loginCard = document.getElementById('loginCard');
        const showLoginLink = document.getElementById('showLoginLink');
        const showRegisterLink = document.getElementById('showRegisterLink');
        const navAuthBtn = document.getElementById('navAuthBtn');

        const createOverlay = document.getElementById('createOverlay');
        const openCreateBtn = document.getElementById('openCreateBtn');
        const closeCreateBtn = document.getElementById('closeCreateBtn');

        // Control del Modal de Crear
        if (openCreateBtn) {
            openCreateBtn.addEventListener('click', () => {
                <?php if ($estaLogueado): ?>
                    createOverlay.classList.remove('hidden');
                <?php else: ?>
                    authOverlay.classList.remove('hidden');
                <?php endif; ?>
            });
        }

        if (closeCreateBtn) {
            closeCreateBtn.addEventListener('click', () => {
                createOverlay.classList.add('hidden');
            });
        }

        if (showLoginLink) {
            showLoginLink.addEventListener('click', (e) => {
                e.preventDefault();
                registerCard.classList.add('hidden');
                loginCard.classList.remove('hidden');
            });
        }

        if (showRegisterLink) {
            showRegisterLink.addEventListener('click', (e) => {
                e.preventDefault();
                loginCard.classList.add('hidden');
                registerCard.classList.remove('hidden');
            });
        }

        if (navAuthBtn) {
            navAuthBtn.addEventListener('click', () => {
                authOverlay.classList.remove('hidden');
            });
        }
    </script>
</body>
</html>