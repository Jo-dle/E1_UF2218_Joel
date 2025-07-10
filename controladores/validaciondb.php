<?php
include_once "db_connect.php";

function sanitizar($conexion, $valor) {
    return mysqli_real_escape_string($conexion, trim($valor));
}


$nombre = isset($_REQUEST["nombre"]) ? sanitizar($conexion, $_REQUEST["nombre"]) : "";
$apellido = isset($_REQUEST["apellido"]) ? $_REQUEST["apellido"] : "";
$DNIingresado = isset($_REQUEST["dni"]) ? $_REQUEST["dni"] : "";
$correo = isset($_REQUEST["correo"]) ? $_REQUEST["correo"] : "";

//echo "Correo recibido: $correo<br>";
//echo "Clave ingresada: $claveIngresada<br>";

if ($nombre && $apellido && $DNIingresado && $correo) {
    // Buscar usuario por correo
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE dni = ?");
    $stmt->bind_param("s", $DNIingresado);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $fila = $resultado->fetch_assoc();
        $DNIguardado = $fila['dni'];

        if ($DNIingresado === $DNIguardado) {
             session_start();
            $_SESSION['usuario'] = $DNIingresado;
           header("Location: ./vistas/index2.php");
           exit;
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }

    $stmt->close();
} else {
    echo "Faltan datos";
}

$conexion->close();
?>
