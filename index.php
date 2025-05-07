<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio de proyectos de desarrollo web y software">
    <title>Mi Blog de Proyectos</title>
    <link rel="stylesheet" href="/taller3/Assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Mi Blog de Proyectos</h1>
        <nav>
            <ul>
                <li><a href="inicio.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="#nuevo-proyecto"><i class="fas fa-plus"></i> Nuevo Proyecto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php
        // Mostrar mensajes de éxito o error
        if (isset($_GET['success'])) {
            if ($_GET['success'] == 1) {
                echo '<div class="success"><i class="fas fa-check-circle"></i> Proyecto creado exitosamente.</div>';
            } elseif ($_GET['success'] == 2) {
                echo '<div class="success"><i class="fas fa-check-circle"></i> Proyecto eliminado exitosamente.</div>';
            }
        }
        if (isset($_GET['error'])) {
            echo '<div class="error"><i class="fas fa-exclamation-circle"></i> ' . htmlspecialchars($_GET['error']) . '</div>';
        }
        ?>

        <section id="nuevo-proyecto" class="form-section">
            <h2><i class="fas fa-plus-circle"></i> Agregar Nuevo Proyecto</h2>
            <form id="project-form" action="crear_post.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="titulo"><i class="fas fa-heading"></i> Título del Proyecto:</label>
                    <input type="text" id="titulo" name="titulo" required placeholder="Ingresa el título de tu proyecto">
                </div>
                <div class="form-group">
                    <label for="descripcion"><i class="fas fa-align-left"></i> Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required placeholder="Describe tu proyecto en detalle"></textarea>
                </div>
                <div class="form-group">
                    <label for="tecnologias"><i class="fas fa-code"></i> Tecnologías Utilizadas:</label>
                    <input type="text" id="tecnologias" name="tecnologias" placeholder="Ej: HTML, CSS, JavaScript, PHP" required>
                </div>
                <div class="form-group">
                    <label for="imagen"><i class="fas fa-image"></i> Subir Imagen:</label>
                    <input type="file" id="imagen" name="imagen" accept="image/*">
                    <small>Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 5MB</small>
                </div>
                <div class="form-group">
                    <label for="imagen_url"><i class="fas fa-link"></i> URL de la Imagen (opcional):</label>
                    <input type="url" id="imagen_url" name="imagen_url" placeholder="https://ejemplo.com/imagen.jpg">
                    <small>Si no subes una imagen, puedes proporcionar una URL</small>
                </div>
                <div class="form-group">
                    <label for="demo_url"><i class="fas fa-external-link-alt"></i> URL del Demo:</label>
                    <input type="url" id="demo_url" name="demo_url" placeholder="https://ejemplo.com/demo">
                </div>
                <div class="form-group">
                    <label for="github_url"><i class="fab fa-github"></i> URL de GitHub:</label>
                    <input type="url" id="github_url" name="github_url" placeholder="https://github.com/usuario/repo">
                </div>
                <button type="submit"><i class="fas fa-plus"></i> Agregar Proyecto</button>
            </form>
        </section>

        <section id="proyectos" class="projects-section">
            <h2><i class="fas fa-project-diagram"></i> Mis Proyectos</h2>
            <div class="projects-container">
                <?php
                $query = "SELECT * FROM projects ORDER BY fecha DESC";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<article class="project">';
                        if (!empty($row['imagen_url'])) {
                            echo '<div class="project-image">';
                            echo '<img src="' . htmlspecialchars($row['imagen_url']) . '" alt="' . htmlspecialchars($row['titulo']) . '">';
                            echo '</div>';
                        }
                        echo '<div class="project-content">';
                        echo '<h3>' . htmlspecialchars($row['titulo']) . '</h3>';
                        echo '<p class="project-description">' . nl2br(htmlspecialchars($row['descripcion'])) . '</p>';
                        echo '<div class="project-tech">';
                        echo '<strong><i class="fas fa-code"></i> Tecnologías:</strong> ' . htmlspecialchars($row['tecnologias']);
                        echo '</div>';
                        echo '<div class="project-links">';
                        if (!empty($row['demo_url'])) {
                            echo '<a href="' . htmlspecialchars($row['demo_url']) . '" target="_blank" class="demo-link"><i class="fas fa-external-link-alt"></i> Demo</a>';
                        }
                        if (!empty($row['github_url'])) {
                            echo '<a href="' . htmlspecialchars($row['github_url']) . '" target="_blank" class="github-link"><i class="fab fa-github"></i> GitHub</a>';
                        }
                        echo '</div>';
                        echo '<time><i class="far fa-calendar-alt"></i> ' . date('d/m/Y', strtotime($row['fecha'])) . '</time>';
                        echo '<form action="eliminar_proyecto.php" method="POST" class="delete-form" onsubmit="return confirm(\'¿Estás seguro de que deseas eliminar este proyecto?\');">';
                        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                        echo '<button type="submit" class="delete-btn"><i class="fas fa-trash"></i> Eliminar</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</article>';
                    }
                } else {
                    echo '<p class="no-projects"><i class="fas fa-folder-open"></i> No hay proyectos todavía.</p>';
                }
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p><i class="fas fa-code"></i> Desarrollado con <i class="fas fa-heart"></i> &copy; 2025 mi blog de proyectos</p>
    </footer>

    <script src="Assets/Scripts/script.js"></script>
</body>
</html> 