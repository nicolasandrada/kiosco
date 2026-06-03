<?php
session_start();

$SQL = "SELECT * FROM usuario 
        WHERE usuario=$usuario AND contrasena=$contrasena";


$_SESSION["usuario"] = $respuesta->fetch_assoc();

header('location:formulario.php');
