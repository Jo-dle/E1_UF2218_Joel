<!DOCTYPE html>
<html lang=es>

<head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
  </head>
  <body>
    <div class="container w-50 mt-5">
        <form id="formulario" action="../controladores/validaciondb.php" method="get">
           <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Introduzca su nombre">
        <div id="nombreInfo" class="form-text text-danger"></div>
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido:</label>
        <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Introduzca sus apellidos">
        <div id="apellidoInfo" class="form-text text-danger"></div>
      </div>
      <div class="mb-3">
        <label for="dni" class="form-label">DNI:</label>
        <input type="text" id="dni" name="dni" maxlength="13" class="form-control" placeholder="00.000.000-X">
        <div id="dniInfo" class="form-text text-danger"></div>
      </div>
            <ul>
                <li id="length" class="invalid"> Debe tener mínimo 8 numeros </li>
                <li id="letter" class="invalid"> Debe tener una letra mayúscula </li>
            </ul>
      
      <div class="mb-3">
        <label for="correo" class="form-label">Correo:</label>
        <input type="email" id="correo" name="correo" class="form-control" placeholder="Introduce un correo">
        <div id="emailInfo" class="form-text text-danger"></div>
      </div>
      <div style="text-align:center;" class="mb-7">
      <button type="submit" class="btn btn-primary">Validar</button>
      </div>
      </div>
      
    </form>
  </div> 
    </div>
    
    <!--scripts-->

    <script src="../scripts/validacion.js"></script>
  </body>
</html>