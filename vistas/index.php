<!DOCTYPE html>
<html lang=es>

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
          body {
    margin-top: 5%;
  }

  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: grey;
    border-radius: 5%;
    padding: 30px;
  }

  .valid {
    color: green;
    font-weight: bold;
  }

  .invalid {
    color: red;
    font-weight: normal;
  }
  </style>
  <body>
    <div class="container w-50 mt-5">
        <form id="formulario" action="/index2.php" method="get">
           <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Introduzca su nombre">
        <div id="nombreInfo" class="form-text text-danger"></div>
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Nombre:</label>
        <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Introduzca sus apellidos">
        <div id="apellidoInfo" class="form-text text-danger"></div>
      </div>
      <div class="mb-3">
        <label for="dni" class="form-label">Nombre:</label>
        <input type="text" id="dni" name="dni" class="form-control" placeholder="Introduzca su DNI">
        <div id="dniInfo" class="form-text text-danger"></div>
      </div>
      <div id="dniInfo" class="form-text">
            <ul>
                <li id="length" class="invalid"> Debe tener mínimo 8 numeros </li>
                <li id="letter" class="invalid"> Debe tener una letra mayuscula </li>
            </ul>
      </div>
      <div class="mb-3">
        <label for="correo" class="form-label">Correo:</label>
        <input type="email" id="correo" name="correo" class="form-control" placeholder="Introduce un correo">
        <div id="emailInfo" class="form-text text-danger"></div>
      </div>
      </div>
      <button type="submit" class="btn btn-primary">Validar</button>
    </form>
  </div> 
    </div>
  </body>
</head>

</html>