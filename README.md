# Blog de Proyectos 🚀

Un sistema web moderno y elegante para mostrar y gestionar proyectos de desarrollo, construido con PHP y MySQL.

![Versión](https://img.shields.io/badge/versión-1.0.0-blue)
![PHP](https://img.shields.io/badge/PHP-7.0+-purple)
![MySQL](https://img.shields.io/badge/MySQL-5.6+-orange)
![Licencia](https://img.shields.io/badge/licencia-MIT-green)

## 📋 Características

- ✨ Diseño moderno y responsive
- 📱 Interfaz intuitiva y fácil de usar
- 🖼️ Soporte para imágenes locales y URLs
- 🔒 Validaciones de seguridad
- 📊 Gestión completa de proyectos
- 🎨 Estilos modernos con CSS3
- ⚡ Optimizado para rendimiento

## 🛠️ Tecnologías Utilizadas

- **Frontend:**
  - HTML5
  - CSS3
  - JavaScript
  - Font Awesome
  - Google Fonts (Inter)

- **Backend:**
  - PHP
  - MySQL
  - XAMPP

## 📦 Requisitos del Sistema

- PHP 7.0 o superior
- MySQL 5.6 o superior
- Servidor web (Apache/Nginx)
- XAMPP (recomendado)
- Navegador web moderno

## 🚀 Instalación

1. **Clonar el repositorio:**
   ```bash
   git clone https://github.com/tu-usuario/blog-proyectos.git
   ```

2. **Configurar la base de datos:**
   - Inicia XAMPP
   - Abre phpMyAdmin
   - La base de datos se creará automáticamente

3. **Configurar el proyecto:**
   - Copia el proyecto a la carpeta `htdocs` de XAMPP
   - Asegúrate de que los permisos de la carpeta `uploads/images` sean correctos

4. **Acceder al proyecto:**
   - Abre tu navegador
   - Visita `http://localhost/blog-proyectos`

## 📁 Estructura del Proyecto

```
blog-proyectos/
├── index.php              # Página principal
├── config.php             # Configuración de la base de datos
├── crear_post.php         # Procesamiento de nuevos proyectos
├── eliminar_proyecto.php  # Eliminación de proyectos
├── inicio.php            # Página de inicio
└── Assets/               # Recursos estáticos
    ├── css/
    │   └── styles.css    # Estilos del sitio
    ├── Scripts/
    │   └── script.js     # JavaScript
    └── Capturas/         # Directorio para imágenes
```

## 💻 Uso

1. **Crear un nuevo proyecto:**
   - Haz clic en "Nuevo Proyecto"
   - Completa el formulario
   - Sube una imagen o proporciona una URL
   - Guarda el proyecto

2. **Ver proyectos:**
   - Los proyectos se muestran en la página principal
   - Ordenados por fecha de creación
   - Con enlaces a demo y GitHub

3. **Eliminar proyectos:**
   - Usa el botón de eliminar en cada proyecto
   - Confirma la eliminación

## 🔒 Seguridad

- Validación de datos en servidor
- Prevención de XSS
- Validación de tipos de archivo
- Límites de tamaño de archivo
- Confirmación para acciones destructivas

## 🎨 Personalización

El proyecto utiliza variables CSS para fácil personalización:

```css
:root {
    --primary-color: #10b981;
    --primary-dark: #059669;
    --secondary-color: #374151;
    /* ... más variables ... */
}
```

## 🤝 Contribuir

1. Haz un Fork del proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📝 Licencia

Este proyecto está bajo la Licencia MIT - ver el archivo [LICENSE.md](LICENSE.md) para más detalles.

## ✨ Características Futuras

- [ ] Sistema de usuarios
- [ ] Categorías de proyectos
- [ ] Comentarios
- [ ] Búsqueda avanzada
- [ ] API REST

## 📞 Soporte

Si encuentras algún problema o tienes alguna sugerencia, por favor:

1. Revisa los issues existentes
2. Crea un nuevo issue
3. Describe el problema o sugerencia detalladamente

## 🙏 Agradecimientos

- [Font Awesome](https://fontawesome.com/) por los iconos
- [Google Fonts](https://fonts.google.com/) por la fuente Inter
- [XAMPP](https://www.apachefriends.org/) por el entorno de desarrollo

---

Desarrollado con ❤️ por [Benjamin Contreras Alvial] 
