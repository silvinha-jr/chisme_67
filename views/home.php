<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHISME67</title>
    <style>
        /* Estilo base y fondo del sitio */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f2f5; /* Fondo general */
        }

        /* Barra de navegación superior */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #ffffff;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        /* Caja del Logo */
        .logo-box img {
        height: 70px;
        mix-blend-mode: multiply; /* Fusiona el fondo de la imagen con el del sitio */
        display: block;
        }   
        /* Caja de Búsqueda */
        .search-box {
            flex-grow: 1;
            max-width: 400px;
            margin: 0 20px;
        }

        .search-box input {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 20px;
            outline: none;
        }

        /* Contenedor de botones/opciones */
        .nav-buttons {
            display: flex;
            gap: 10px;
        }

        /* Estilo general de los botones */
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-home {
            background-color: transparent;
            color: #333;
        }

        .btn-create {
            background-color: #ff6600; /* Color primario acorde al logo */
            color: white;
        }

        .btn-login {
            background-color: #4a148c; /* Color secundario acorde al logo */
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

    <!-- Encabezado con las cajas de opciones -->
    <header class="navbar">
        
        <!-- Caja del Logo -->
        <div class="logo-box">
            <a href="#">
                <!-- Reemplaza 'logo.png' por la ruta de tu imagen -->
                <img src="image1-removebg-preview.png" alt="CHISME67 Logo">
            </a>
        </div>

        <!-- Caja de Buscar -->
        <div class="search-box">
            <form action="#">
                <input type="text" placeholder="Buscar en Chisme67...">
            </form>
        </div>

        <!-- Caja de Opciones / Botones -->
        <nav class="nav-buttons">
            <a href="#" class="btn btn-home">Inicio</a>
            <button class="btn btn-create">+ Crear</button>
            <button class="btn btn-login">Iniciar Sesión</button>
        </nav>

    </header>

</body>
</html>