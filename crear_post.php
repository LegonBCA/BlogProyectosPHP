<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $tecnologias = trim($_POST['tecnologias'] ?? '');
    $imagen_url = trim($_POST['imagen_url'] ?? '');
    $demo_url = trim($_POST['demo_url'] ?? '');
    $github_url = trim($_POST['github_url'] ?? '');
    $errors = [];

    // Validación del lado del servidor
    if (empty($titulo)) {
        $errors[] = "El título es obligatorio";
    } elseif (strlen($titulo) < 3) {
        $errors[] = "El título debe tener al menos 3 caracteres";
    }

    if (empty($descripcion)) {
        $errors[] = "La descripción es obligatoria";
    } elseif (strlen($descripcion) < 10) {
        $errors[] = "La descripción debe tener al menos 10 caracteres";
    }

    if (empty($tecnologias)) {
        $errors[] = "Las tecnologías son obligatorias";
    }

    // Manejo de la imagen subida
    $imagen_final_url = $imagen_url; // Por defecto, usar la URL proporcionada

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['imagen'];
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 5 * 1024 * 1024; // 5MB

        // Validar tipo de archivo
        if (!in_array($file['type'], $allowed_types)) {
            $errors[] = "Tipo de archivo no permitido. Solo se permiten JPG, PNG y GIF.";
        }
        // Validar tamaño
        elseif ($file['size'] > $max_size) {
            $errors[] = "El archivo es demasiado grande. El tamaño máximo es 5MB.";
        }
        else {
            // Generar nombre único para el archivo
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $new_filename = uniqid() . '.' . $extension;
            $upload_path = 'uploads/images/' . $new_filename;

            // Intentar mover el archivo
            if (move_uploaded_file($file['tmp_name'], $upload_path)) {
                $imagen_final_url = $upload_path;
            } else {
                $errors[] = "Error al subir la imagen. Por favor, inténtalo de nuevo.";
            }
        }
    }

    if (empty($errors)) {
        // Preparar la consulta para prevenir inyección SQL
        $stmt = mysqli_prepare($conn, "INSERT INTO projects (titulo, descripcion, tecnologias, imagen_url, demo_url, github_url) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssssss", $titulo, $descripcion, $tecnologias, $imagen_final_url, $demo_url, $github_url);

        if (mysqli_stmt_execute($stmt)) {
            // Redirigir con mensaje de éxito
            header("Location: index.php?success=1");
            exit;
        } else {
            $errors[] = "Error al crear el proyecto: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }

    // Si hay errores, redirigir de vuelta con mensajes de error
    if (!empty($errors)) {
        $error_string = urlencode(implode(", ", $errors));
        header("Location: index.php?error=" . $error_string);
        exit;
    }
} else {
    // Si no es una petición POST, redirigir al inicio
    header("Location: index.php");
    exit;
}
?> 