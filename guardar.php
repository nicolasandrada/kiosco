<?php
// Incluye la conexion.php
include "conexion.php"; 

// Captura los datos del formulario que llegan por Metodo POST
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripciones'];

// Almacena la direccion temporal del archivo
$imagen_dir = $_FILES['foto']['tmp_name'];
// Almacena el nombre del archivo
$imagen_nombre = $_FILES['foto']['name'];  

//mueve el archivo temporal a la carpeta de imagenes 
move_uploaded_file($imagen_dir,"imagenes/". rand() .$imagen_nombre);

// Crea la consulta para insertar dentro de productos
$SQL = "INSERT INTO producto (nombre,categoria, marca, descripcion,foto) 
        VALUES ('$nombre',$categoria,$marca,'$descripcion','imagenes/.$imagen_nombre')"; 

// Ejecuta la consulta
$con->query( $SQL );

// Redirije a mostrar.php 
header("location: mostrar.php");