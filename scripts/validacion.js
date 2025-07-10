console.log("JS cargado correctamente");

$(document).ready(function () {
  $('#formulario').submit(function (e) {
    let valid = true;

    //Nombre y Apellido
    const nombre = $('#nombre').val().trim();
    const apellido = $('#apellido').val().trim();
    const textoRegex = /^[A-Za-zÁÉÍÓÚÑáéíóúñ\s]+$/;

    if (!textoRegex.test(nombre)) {
      $('#nombreInfo').text('El nombre solo debe contener letras.');
      valid = false;
    } else {
      $('#nombreInfo').text('');
    }

    if (!textoRegex.test(apellido)) {
      $('#apellidoInfo').text('El apellido solo debe contener letras.');
      valid = false;
    } else {
      $('#apellidoInfo').text('');
    }

    //DNI
    const dni = $('#dni').val().trim();
    const dniRegex = /^\d{2}\.\d{3}\.\d{3}-[A-Z]$/;

    if (!dniRegex.test(dni)) {
      $('#dniInfo').text('DNI no válido. Formato: 00.000.000-X');
      valid = false;
    } else {
      $('#dniInfo').text('');
    }
//Forzar formato en DNI
    $('#dni').on('input', function () {
    let valor = $(this).val().replace(/\D/g, ''); 
    if (valor.length > 8) {
        valor = valor.substring(0, 8); //
    }

    let formateado = '';
    if (valor.length >= 2) {
        formateado = valor.substring(0, 2);
        if (valor.length >= 5) {
        formateado += '.' + valor.substring(2, 5);
        if (valor.length >= 8) {
            formateado += '.' + valor.substring(5, 8) + '-';
        } else if (valor.length > 5) {
            formateado += '.' + valor.substring(5);
        }
        } else if (valor.length > 2) {
        formateado += '.' + valor.substring(2);
        }
    } else {
        formateado = valor;
    }

    // Añadir la letra si ya la escribió
    const original = $(this).val();
    const letraMatch = original.match(/[A-Z]$/i);
    if (letraMatch && valor.length === 8) {
        formateado += '-' + letraMatch[0].toUpperCase();
    }

  $(this).val(formateado);
});

    //Correo Electrónico
    const email = $('#correo').val().trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
      $('#emailInfo').text('Correo no válido.');
      valid = false;
    } else {
      $('#emailInfo').text('');
    }

    if (!valid) {
      e.preventDefault();
    }
  });
});
