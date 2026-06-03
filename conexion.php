<?php
$con = new mysqli('localhost', 'root', '', 'kiosco');

if($con->connect_error){
    echo "Error en la conexion: ". $con->connect_error; 
}
