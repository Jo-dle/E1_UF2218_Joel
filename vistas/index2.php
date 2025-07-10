<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Instancia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding: 40px;
      background-color: #f8f9fa;
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    .strong {
      font-weight: bold;
      margin-top: 20px;
    }
    .border-container {
      border: 2px solid #333;
      padding: 20px;
      border-radius: 8px;
      background-color: white;
      max-width: 800px;
      margin: 0 auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>

<body>

<?php
// Recoger variables de GET y sanitizarlas para mostrar
$nombre = isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '';
$apellido = isset($_GET['apellido']) ? htmlspecialchars($_GET['apellido']) : '';
$DNIinsertado = isset($_GET['dni']) ? htmlspecialchars($_GET['dni']) : '';
$correo = isset($_GET['correo']) ? htmlspecialchars($_GET['correo']) : '';
?>

  <div class="border-container">
    <h2>Instancia</h2>

    <p class="text-end">Fecha: <?php echo date('d/m/Y'); ?></p>

    <div class="strong">
      <?php 
        echo "$nombre $apellido DNI $DNIinsertado y correo electrónico $correo"; 
      ?>
    </div>

    <form class="mt-4">
      <div class="mb-3">
        <label for="expone" class="form-label">Expone:</label>
        <textarea class="form-control" id="expone" rows="4" placeholder="Explique aquí los hechos..."></textarea>
      </div>

      <div class="mb-3">
        <label for="solicita" class="form-label">Solicita:</label>
        <textarea class="form-control" id="solicita" rows="4" placeholder="Explique aquí su solicitud..."></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Enviar instancia</button>
    </form>
  </div>

</body>
</html>
