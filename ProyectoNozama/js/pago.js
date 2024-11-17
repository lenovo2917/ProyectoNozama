document.addEventListener("DOMContentLoaded", function() {
    // Obtener el formulario
    const form = document.querySelector('form[action="procesar_pedido.php"]');

    // Obtener los campos de envío y forma de pago
    const envioRadios = document.querySelectorAll('input[name="id_envio"]');
    const pagoRadios = document.querySelectorAll('input[name="id_forma_pago"]');

    // Obtener los campos ocultos
    const envioInput = form.querySelector('input[name="id_envio"]');
    const pagoInput = form.querySelector('input[name="id_forma_pago"]');

    // Función para activar el botón si ambos campos están seleccionados
    function checkSelection() {
        const boton = form.querySelector('button[type="submit"]');
        if (envioInput.value && pagoInput.value) {
            boton.disabled = false;
        } else {
            boton.disabled = true;
        }
    }

    // Agregar eventos a los radios de envío
    envioRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            envioInput.value = this.value; // Actualizar el valor del campo oculto
            checkSelection(); // Verificar si habilitar el botón
        });
    });

    // Agregar eventos a los radios de forma de pago
    pagoRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            pagoInput.value = this.value; // Actualizar el valor del campo oculto
            checkSelection(); // Verificar si habilitar el botón
        });
    });

    

    // Inicializar el estado del botón al cargar la página
    checkSelection();
});
