<?php
session_start();
include_once "db_connect.php";

function sanitizar($conexion, $valor) {
    return mysqli_real_escape_string($conexion, trim($valor));
}


$nombre = isset($_REQUEST["nombre"]) ? sanitizar($conexion, $_REQUEST["nombre"]) : "";
$apellido = isset($_REQUEST["apellido"]) ? $_REQUEST["apellido"] : "";
$DNIingresado = isset($_REQUEST["dni"]) ? $_REQUEST["dni"] : "";
$correo = isset($_REQUEST["correo"]) ? $_REQUEST["correo"] : "";

if ($nombre && $apellido && $DNIingresado && $correo) {
    // Buscar usuario con todos los datos
   $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE nombre = ? AND apellido = ? AND dni = ? AND correo = ?");
    $stmt->bind_param("ssss", $nombre, $apellido, $DNIingresado, $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $fila = $resultado->fetch_assoc();
        $DNIguardado = $fila['dni'];

        if ($DNIingresado === $DNIguardado) {
           
           header("Location: ../vistas/index2.php?nombre=$nombre&apellido=$apellido&dni=$DNIingresado&correo=$correo");
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
