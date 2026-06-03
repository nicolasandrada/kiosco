<?php
//Incluye la conexion
include "conexion.php";

//Obtine el id de la URL 
$id = $_GET['id'];

//Arma la consulta para eliminar el registro completo de producto donde el ID coincida
$SQL = "DELETE FROM producto WHERE id = $id";

//Ejecuta la consulta
$con->query($SQL);

// Redirecciona hacia mostrar.php
header("location: mostrar.php");