<?php
// PÁGINA TEMPORAL SOLO PARA PROBAR EL BACK END (sin diseño).
// Borrar este archivo y la ruta 'prueba_reacciones' de index.php antes de entregar.
require_once 'models/Publicacion.php';

$idUsuario = $_SESSION['usuario_id'] ?? null;
$publicaciones = Publicacion::obtenerTodas('populares', $idUsuario);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba de reacciones - CHISME67</title>
</head>
<body style="font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto;">
    <h2>Prueba de reacciones (temporal)</h2>

    <?php if (!$idUsuario): ?>
        <p><strong>No iniciaste sesión.</strong> Entrá desde <a href="index.php">el inicio</a> y volvé acá.</p>
    <?php endif; ?>

    <?php foreach ($publicaciones as $pub): ?>
        <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
            <strong><?php echo htmlspecialchars($pub['nombre_completo']); ?></strong>
            <p><?php echo htmlspecialchars($pub['contenido']); ?></p>

            <form action="index.php?action=reaccionar" method="POST" style="display: flex; gap: 10px;">
                <input type="hidden" name="id_publicacion" value="<?php echo (int)$pub['id_publicacion']; ?>">
                <button type="submit" name="tipo" value="like"
                    style="<?php echo $pub['mi_reaccion'] === 'like' ? 'font-weight: bold; background: #c8e6c9;' : ''; ?>">
                    👍 <?php echo $pub['likes']; ?>
                </button>
                <button type="submit" name="tipo" value="dislike"
                    style="<?php echo $pub['mi_reaccion'] === 'dislike' ? 'font-weight: bold; background: #ffcdd2;' : ''; ?>">
                    👎 <?php echo $pub['dislikes']; ?>
                </button>
            </form>
        </div>
    <?php endforeach; ?>

    <?php if (empty($publicaciones)): ?>
        <p>No hay publicaciones todavía.</p>
    <?php endif; ?>
</body>
</html>