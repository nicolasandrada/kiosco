<?php

//Incluye la conexion
include "conexion.php";

//Captura los datos por el metodo POST
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];

// Crea la consulta para modificar productos por los nuevos datos, donde el ID coincida
$SQL = "UPDATE producto
        SET nombre='$nombre', categoria=$categoria, marca=$marca, descripcion='$descripcion'
        WHERE id = $id";

// Ejecuta la consulta
$con->query($SQL);

// Redirecciona hacia mostrar.php
header("location: mostrar.php");