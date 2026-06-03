<?php
//incluye la conexion
include "conexion.php";

// Obtiene el ID que llega por la URL 
$id = $_GET['id'];

// Crea la consulta para selecionar todos los datos de productos en el que coincida el ID 
$SQL = "SELECT * FROM producto WHERE id=$id";

//Ejecuta la consulta y guarda el resultado en la variable "resultado"
$resultado = $con->query($SQL);

// $resultado lo transforma en un arreglo (con asociaciones)
// y guardarda en $dato
$datos = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="modificar.php" method="post">
        <!-- Crea un elemento oculto y le guarda como valor el id -->
        <input type="hidden" name="id" value="<?php echo $id ?>">

        <label for="x">Nombre</label>
        <!-- Crea un elemento de texto y le guarda/muestra como valor el nombre -->
        <input type="text" name="nombre" id="x" value="<?php echo $datos["nombre"] ?>" ><br>
        
        <select name="categoria" id="categoria">
        </select><br>

        <select name="marca" id="marca">
        </select><br>

        <!-- Crea un elemento de texto y le guarda/muestra como valor la descripcion -->
        <textarea name="descripcion" value="<?php echo $datos["descripcion"] ?>"></textarea><br>

        <input type="submit" value="Guardar"><br>

    </form>

    <script>
        // Selecciona el elemento cuyo id es "categoria".
        // lista desplegable de categorias
        let cate = document.getElementById("categoria")

        //envia una solicitud HTTP a categorias.php
        fetch("categorias.php")
        //indica al programa que los datos estan formateados en JSON
        .then(datos => datos.json())
        //cuando tenga el resultado los carga como un OPTION los datos
        .then(resultado =>{
            //resultado como es un arreglo lo recorremos mediante un FOREACH (lo carga de a uno en aux)
            resultado.forEach( aux =>{ 
                // validamos si el id de aux es el mismo que tenemos en $datos[categoria]
                if (aux.id== <?php echo $datos["categoria"] ?> ){
                    // Si es asi 
                    // ingresa dentro del HTML de la lista desplegable de antes
                    // un OPTION con los valores y lo seleccionamos (selected)
                    cate.innerHTML += "<option value='"+aux.id+"' selected>"+aux.nombre+"</option>"
                }else{
                    // Si no 
                    // ingresa dentro del HTML de la lista desplegable de antes
                    // un OPTION con los valores 
                    cate.innerHTML += "<option value='"+aux.id+"'>"+aux.nombre+"</option>"
                }
               
                //cate.innerHTML += `<option value='${aux.id}'>${aux.nombre}</option>`
            })
            
        })


        //Lo mismo que antes pero para Marca
        let marca = document.getElementById("marca")
        fetch("marca.php")
        .then(datos => datos.json())
        .then(resultado =>{
            resultado.forEach( aux =>{ 
                if (aux.id== <?php echo $datos["marca"] ?> ){
                    marca.innerHTML += "<option value='"+aux.id+"' selected>"+aux.nombre+"</option>"
                }else{
                    marca.innerHTML += "<option value='"+aux.id+"'>"+aux.nombre+"</option>"
                }
            })
            
        })
    </script>
</body>
</html>