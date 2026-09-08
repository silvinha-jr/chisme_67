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
    <div id="authOverlay" class="auth-overlay">
        
        <!-- Tarjeta de Registro (Visible por defecto) -->
        <div id="registerCard" class="login-card">
            <h2>Crear Cuenta en CHISME67</h2>
            <p>Regístrate para ver todos los chismes y publicaciones.</p>
            <form id="registerForm">
                <input type="text" placeholder="Nombre completo" required>
                <input type="email" placeholder="Correo electrónico" required>
                <input type="password" placeholder="Contraseña" required>
                <button type="submit" class="btn-submit">Registrarse</button>
            </form>
            <p style="margin-top: 15px; font-size: 13px;">
                ¿Ya tienes una cuenta? <a href="#" id="showLoginLink" style="color: #4a148c; font-weight: bold; text-decoration: none;">Inicia Sesión</a>
            </p>
        </div>

        <!-- Tarjeta de Inicio de Sesión (Oculta por defecto) -->
        <div id="loginCard" class="login-card hidden">
            <h2>Bienvenido a CHISME67</h2>
            <p>Ingresa tus datos para acceder a la plataforma.</p>
            <form id="loginForm">
                <input type="text" placeholder="Usuario o Email" required>
                <input type="password" placeholder="Contraseña" required>
                <button type="submit" class="btn-submit">Entrar</button>
            </form>
            <p style="margin-top: 15px; font-size: 13px;">
                ¿No tienes cuenta? <a href="#" id="showRegisterLink" style="color: #4a148c; font-weight: bold; text-decoration: none;">Regístrate</a>
            </p>
        </div>

    </div>

    <!-- Barra de Navegación -->
    <header class="navbar">
        <div class="logo-box">
            <a href="#">
                <img src="public/img/image1.png" alt="CHISME67 Logo">
            </a>
        </div>
        <div class="search-box">
            <form action="#">
                <input type="text" placeholder="Buscar en Chisme67...">
            </form>
        </div>
        <nav class="nav-buttons">
            <a href="#" class="btn btn-home">Inicio</a>
            <button class="btn btn-create">+ Crear</button>
            <button id="navAuthBtn" class="btn btn-login">Registrarse</button>
        </nav>
    </header>

    <!-- Feed Principal -->
    <main style="padding: 20px; max-width: 600px; margin: auto;">
        <h3>Feed de Chismes</h3>
        
        <div class="post-card">
            <strong>silvhinajr:</strong> ¿Se enteraron de lo que pasó en la ayer? 👀
        </div>
        <div class="post-card">
            <strong>thiagobe36:</strong> ¿Cursed Housed 3 estara en preventa en 2027? 👀
        </div>
        <div class="post-card">
            <strong>juan:</strong> Menos farmeo de aura y mas farmeo de codigo
        </div>
        <div class="post-card">
            <strong>azure:</strong> ¿nuevo meta en Forsaken???
        </div>
        <div class="post-card">
            <strong>chamuel:</strong> ¿嗨，我是塞缪尔。你觉得动漫怎么样？?
        </div>
        <div class="post-card">
            <strong>isac:</strong> ¿nuevo anuncio de la nueva actualizacion de the battle cats? 👀
        </div>
        <div class="post-card">
            <strong>sorIA:</strong> ¿MR.ROBOT una serie infralorada???
        </div>
        <div class="post-card">
            <strong>elliot:</strong> ¿FORSAKEN, el mejor juego de la decada???
        </div>
        <div class="post-card">
            <strong>Jose Martinez:</strong> No me gusto la nueva pelicula de spiderman, muy mala
        </div>
        <div class="post-card">
            <strong>Andrick Villaroel:</strong> Si me guto la nueva pelicula de spiderman, muy buena
        </div>
        <div class="post-card">
            <strong>Jane Doe:</strong> No lo volvere a repetir!!!, FORSAKEN supera a todos los juegos del milenio, mas que GTA.
        </div>
        <div class="post-card">
            <strong>Claire Redfield:</strong> Me recomiendan unirme a mepacademia??
        </div>
        <div class="post-card">
            <strong>JOAQUIN DIAZ:</strong> Se filtro la nueva actualizacion de geometry dash 2.209, me emociona!!!!
        </div>
        <div class="post-card">
            <strong>THIAGO UNBOM:</strong> Se filtro la nueva actualizacion de geometry dash 2.209,no me emociona!!!!
        </div>
    </main>

    <!-- Script de Control del Modal y Registro/Login -->
    <script>
        const authOverlay = document.getElementById('authOverlay');
        const registerCard = document.getElementById('registerCard');
        const loginCard = document.getElementById('loginCard');
        
        const registerForm = document.getElementById('registerForm');
        const loginForm = document.getElementById('loginForm');
        
        const showLoginLink = document.getElementById('showLoginLink');
        const showRegisterLink = document.getElementById('showRegisterLink');
        const navAuthBtn = document.getElementById('navAuthBtn');

        // Alternar entre las vistas de Registro e Inicio de Sesión
        showLoginLink.addEventListener('click', (e) => {
            e.preventDefault();
            registerCard.classList.add('hidden');
            loginCard.classList.remove('hidden');
        });

        showRegisterLink.addEventListener('click', (e) => {
            e.preventDefault();
            loginCard.classList.add('hidden');
            registerCard.classList.remove('hidden');
        });

        // Verificar estado de la sesión al cargar la página
        window.addEventListener('DOMContentLoaded', () => {
            const isLoggedIn = localStorage.getItem('isLoggedIn');
            if (isLoggedIn === 'true') {
                authOverlay.classList.add('hidden');
                navAuthBtn.textContent = 'Cerrar Sesión';
            }
        });

        // Evento Registro (Pasa directo a la sesión activa)
        registerForm.addEventListener('submit', (e) => {
            e.preventDefault();
            localStorage.setItem('isLoggedIn', 'true');
            authOverlay.classList.add('hidden');
            navAuthBtn.textContent = 'Cerrar Sesión';
            alert('¡Registro completado e inicio de sesión exitoso!');
        });

        // Evento Login
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            localStorage.setItem('isLoggedIn', 'true');
            authOverlay.classList.add('hidden');
            navAuthBtn.textContent = 'Cerrar Sesión';
            alert('¡Inicio de sesión exitoso!');
        });

        // Botón superior de la barra de navegación
        navAuthBtn.addEventListener('click', () => {
            const isLoggedIn = localStorage.getItem('isLoggedIn');

            if (isLoggedIn === 'true') {
                localStorage.removeItem('isLoggedIn');
                navAuthBtn.textContent = 'Registrarse';
                registerCard.classList.remove('hidden');
                loginCard.classList.add('hidden');
                authOverlay.classList.remove('hidden');
                alert('Sesión cerrada.');
            } else {
                authOverlay.classList.remove('hidden');
            }
        });
    </script>
</body>
</html>