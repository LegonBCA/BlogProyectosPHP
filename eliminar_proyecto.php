<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    
    // Validar que el ID sea un número positivo
    if ($id <= 0) {
        header("Location: index.php?error=ID inválido");
        exit;
    }

    // Preparar la consulta para prevenir inyección SQL
    $stmt = mysqli_prepare($conn, "DELETE FROM projects WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?success=2"); // 2 indica eliminación exitosa
    } else {
        header("Location: index.php?error=Error al eliminar el proyecto");
    }

    mysqli_stmt_close($stmt);
} else {
    // Si no es una petición POST o no hay ID, redirigir al inicio
    header("Location: index.php");
}
exit;
?> 