console.log("JS cargado correctamente");

$(document).ready(function () {

  // Validación en tiempo real del correo
  $('#correo').on('input', function () {
    const email = $(this).val().trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email) && email !== '') {
      $('#emailInfo').text('Correo no válido.');
    } else {
      $('#emailInfo').text('');
    }
  });

  // Validación en directo de requisitos del DNI
  $('#dni').on('input', function () {
    let valor = $(this).val().replace(/\D/g, '').substring(0, 8);
    let formateado = '';

    if (valor.length >= 2) {
      formateado = valor.substring(0, 2);
      if (valor.length >= 5) {
        formateado += '.' + valor.substring(2, 5);
        if (valor.length >= 8) {
          formateado += '.' + valor.substring(5, 8);
        } else if (valor.length > 5) {
          formateado += '.' + valor.substring(5);
        }
      } else if (valor.length > 2) {
        formateado += '.' + valor.substring(2);
      }
    } else {
      formateado = valor;
    }

    const original = $(this).val();
    const letraMatch = original.match(/-?([A-Z])$/i);
    if (letraMatch && valor.length === 8) {
      formateado += '-' + letraMatch[1].toUpperCase();
    }

    $(this).val(formateado);

    // Validación en tiempo real del DNI
    const tiene8Numeros = valor.length === 8;
    const tieneLetra = /[A-Z]$/i.test(original);

    $('#length').toggleClass('valid', tiene8Numeros).toggleClass('invalid', !tiene8Numeros);
    $('#letter').toggleClass('valid', tieneLetra).toggleClass('invalid', !tieneLetra);

    if (tiene8Numeros && tieneLetra) {
      $('#dniInfo').text('');
    }
  });

  // Validación al enviar el formulario
  $('#formulario').submit(function (e) {
    let valid = true;

    // Validar nombre
    const nombre = $('#nombre').val().trim();
    const textoRegex = /^[A-Za-zÁÉÍÓÚÑáéíóúñ\s]+$/;
    if (!textoRegex.test(nombre)) {
      $('#nombreInfo').text('El nombre solo debe contener letras.');
      valid = false;
    } else {
      $('#nombreInfo').text('');
    }

    // Validar apellido
    const apellido = $('#apellido').val().trim();
    if (!textoRegex.test(apellido)) {
      $('#apellidoInfo').text('El apellido solo debe contener letras.');
      valid = false;
    } else {
      $('#apellidoInfo').text('');
    }

    // Validar DNI
    const dni = $('#dni').val().trim();
    const dniRegex = /^\d{2}\.\d{3}\.\d{3}-[A-Z]$/;
    if (!dniRegex.test(dni)) {
      $('#dniInfo').text('DNI no válido. Formato: 00.000.000-X');
      valid = false;
    } else {
      $('#dniInfo').text('');
    }

    // Validar correo
    const email = $('#correo').val().trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email !== '' && !emailRegex.test(email)) {
      $('#emailInfo').text('Correo no válido.');
      valid = false;
    } else {
      $('#emailInfo').text('');
    }

    // Si hay errores, se bloquea el envío
    if (!valid) {
      e.preventDefault();
    }
  });
});
