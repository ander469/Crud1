<?php

function conectar() { 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "crud1_users";


// 1. Conectar a la base de datos
    $conn = mysqli_connect($host, $user, $pass, $db);

    // 2. Verificar conexión
    if(!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

     return $conn;
    
};
    

?>