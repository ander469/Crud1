<?php
// conexion a la base de datos
include 'conection.php';
$conn = conectar();

// recibir datos del formulario para registrar los nuevos usuarios
$id = NULL;
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$email = $_POST['email'];


$sql = "INSERT INTO users ('id', 'nombre', 'apellido', 'usuario', 'contraseña', 'email')
                VALUES (NULL, '$nombre', '$apellido', '$usuario', '$contraseña', '$email')";

if($query){
    Header("location: index.php");
}

?>