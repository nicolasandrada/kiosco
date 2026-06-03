<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="guardar.php" method="post" enctype="multipart/form-data">
        <label for="x">Nombre</label>
        <input type="text" name="nombre" id="x" ><br>
        
        <select name="categoria" id="categoria">
        </select><br>

        <select name="marca" id="marca">
        </select><br>

        <textarea name="descripcion"></textarea><br>

        <input type="file" name="foto">

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
                // ingresa dentro del HTML de la lista desplegable de antes 
                // un OPTION con los valores 
                cate.innerHTML += "<option value='"+aux.id+"'>"+aux.nombre+"</option>"
                //Otra forma de escribirlo
                //cate.innerHTML += `<option value='${aux.id}'>${aux.nombre}</option>`
            })
            
        })


        //Hace lo mismo de antes pero con marca 
        let marca = document.getElementById("marca")
        fetch("marca.php")
        .then(datos => datos.json())
        .then(resultado =>{
            resultado.forEach( aux =>{ 
                marca.innerHTML += "<option value='"+aux.id+"'>"+aux.nombre+"</option>"
                //cate.innerHTML += `<option value='${aux.id}'>${aux.nombre}</option>`
            })
            
        })
    </script>
</body>
</html>