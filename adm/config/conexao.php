<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$db_name = "administrativo";

$conn = mysqli_connect($servidor, $usuario, $senha, $db_name);

if (!$conn){
    die("Falha em conectar com o servidor: " . mysqli_connect_error());
}/*else{
    echo "Conectado";
}*/
