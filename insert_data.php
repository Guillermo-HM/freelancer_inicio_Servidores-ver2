<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "formulario";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if(isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];

    $insertarDatos = "INSERT INTO personas (nombre, apellidos, edad, calle, numero) VALUES ('$nombre','$apellidos','$edad','$calle','$numero')";
    mysqli_query($enlace, $insertarDatos);
}
?>