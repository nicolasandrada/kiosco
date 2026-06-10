<?php
session_start();
include "conexion.php";

$usuario = $_POST["usuario"];
$contrasena = $_POST["contra"];

$SQL = "SELECT * FROM usuario 
        WHERE usuario='$usuario' AND contrasena='$contrasena'";

echo $SQL;

$con->prepare("SELECT * FROM usuario 
        WHERE usuario=? AND contrasena='$contrasena'");

$respuesta = $con->query($SQL);

echo $SQL;
if($respuesta->num_rows > 0){
        $_SESSION["usuario"] = $respuesta->fetch_assoc();
       // header('location:formlario.php');
}else{
       // header('location:inicio_sesion.php');
}



