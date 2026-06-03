<?php 
//Incluye la conexion
include "conexion.php";

// Crea la consulta para seleccionar los produtos pero relacionandolas con categoria y marca
// Tambien les agregar un alias a los datos seleccionados
$SQL = "SELECT producto.id AS id, producto.nombre AS np, categoria.nombre AS nc, marca.nombre AS nm, descripcion FROM producto 
        INNER JOIN categoria ON categoria.id = producto.categoria
        INNER JOIN marca ON marca.id = producto.marca
        ORDER BY id ASC";

// Ejecuta la consulta y guarda el resultado en la variable "resultado"
$result = $con->query($SQL);

// Crea la estructura de Tabla HTML
echo "<table border='1'>";

// Repite mientras $resultado pueda transformar el registro en un arreglo (con asociaciones)
// y guardarlo en $dato
while($datos = $result->fetch_assoc()){
    // Genera la fila de la tabla
    echo "<tr>";
        // Muestra el dato del arreglo $dato
        echo "<td>$datos[id]</td>";
        echo "<td>$datos[np]</td>";
        echo "<td>$datos[nc]</td>";
        echo "<td>$datos[nm]</td>";

        // Genera los links para modificar (formulario_modificar.php) 
        // y para eliminar (eliminar.php)
        // pasandole por URL el id del registro
        echo "<td>  
            <a href='eliminar.php?id=$datos[id]'> Eliminar </a>  
        </td>";
        echo "<td>  
            <a href='formulario_modificar.php?id=$datos[id]'> Modificar </a>  
        </td>";
        
        // Mismo ejemplo para eliminar pero con un boton
        echo "<td>  
            <form action='eliminar.php'>
                <input type='hidden' value='$datos[id]' name='id'> 
                <input type='button' value='Eliminar'>
            </form>
        </td>";
    echo "</tr>";
}

// Cierra la estructura de tabla
echo "</table>";
?>

<!-- Script para mostrar un mensaje de confirmacion -->
<script>
    // Selecciona todos los Botones
    let bt = document.querySelectorAll("input")

    // Recoore todos los elementos botones para agregar un evento de click
    bt.forEach(e=>{
        e.addEventListener("click", ()=>{
            // Muestra un mensaje de confirmacion
            console.log( confirm("Estas Seguuuuuro?") )
        })
    })
</script>