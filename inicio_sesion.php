<?php
require_once "conexion.php";
session_start();

if ($_SERVER[ 'REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
}
?>