document.addEventListener('DOMContentLoaded', function() {
    const postForm = document.getElementById('post-form');
    const titleInput = document.getElementById('titulo');
    const contentInput = document.getElementById('contenido');

    // Función para validar el formulario
    function validateForm() {
        let isValid = true;
        const errors = [];

        // Eliminar mensajes de error anteriores
        document.querySelectorAll('.error').forEach(error => error.remove());

        // Validar título
        if (titleInput.value.trim() === '') {
            showError(titleInput, 'El título es obligatorio');
            isValid = false;
        } else if (titleInput.value.length < 3) {
            showError(titleInput, 'El título debe tener al menos 3 caracteres');
            isValid = false;
        }

        // Validar contenido
        if (contentInput.value.trim() === '') {
            showError(contentInput, 'El contenido es obligatorio');
            isValid = false;
        } else if (contentInput.value.length < 10) {
            showError(contentInput, 'El contenido debe tener al menos 10 caracteres');
            isValid = false;
        }

        return isValid;
    }

    // Función para mostrar errores
    function showError(element, message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error';
        errorDiv.textContent = message;
        element.parentNode.appendChild(errorDiv);
    }

    // Evento submit del formulario
    postForm.addEventListener('submit', function(e) {
        if (!validateForm()) {
            e.preventDefault();
        }
    });

    // Validación en tiempo real
    titleInput.addEventListener('input', function() {
        const errorElement = this.parentNode.querySelector('.error');
        if (errorElement) {
            errorElement.remove();
        }
    });

    contentInput.addEventListener('input', function() {
        const errorElement = this.parentNode.querySelector('.error');
        if (errorElement) {
            errorElement.remove();
        }
    });
}); 