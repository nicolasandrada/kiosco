<?php
//Incluye la conexion
include "conexion.php";

//Seleciona todos los datos de Marca
$SQL = "SELECT * FROM marca"; 

//Ejecuta la consulta y guarda el resultado en la variable "resultado"
$resultado = $con->query($SQL);

//Crea registros como un arreglo
$registros = [];

// Repite mientras $resultado pueda transformar el registro en un arreglo (con asociaciones)
// y guardarlo en $dato
while ($dato = $resultado->fetch_assoc()){
    // Guarda el arreglo "datos" dentro de una de las posiciones de "registro"
    $registros[] = $dato;
}

// Transforma el arreglo $registro en un JSON y lo imprime en pantalla
echo json_encode($registros);