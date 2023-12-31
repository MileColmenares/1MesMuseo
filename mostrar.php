<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--linkea el css-->
    <link rel="stylesheet" type="text/css" href="css/mostrarMas.css">
    <title>Ver unidad documental</title>
</head>
<body>
    
    <?php
    //trae la conexion, la cabecera y el buscador
    include("conexion.php");
    include("header.php");
    include ("buscador.php");
    //obtener datos
    $sql =  "SELECT * FROM unidad_documental1 WHERE id_documento";
    $result = $datos_bd->query($sql);
    if ($result->num_rows > 0) {
        echo "<div class'containerQ'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Fondo, subfondo, serie, subserie</th>";
        echo "<th>Nombre</th>";
        echo "<th>Fecha(s)</th>";
        echo "<th>Ubicación</th>";
        echo "<th>Condición de acceso</th>";
        echo "<th>Condición de reproducción</th>";
        echo "<th>Ver mas</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

//llena la tabla con info de la base
while ($row = $result->fetch_assoc()) {
    
    echo "<td data-label='Id'>" . $row['id_documento'] . "</td>";
    echo "<td data-label='Fondo, subfondo, serie'>" . $row['id_fondo'] . "<br>" . $row['id_subfondo'] ."<br>" . $row['id_serie'] ."<br>" . $row['id_subserie'] . "</td>";
    echo "<td data-label='Nombre'>" . $row['nombre_documento'] . "</td>";
    echo "<td data-label='Fecha(s)'>" . $row['fecha_inicio'] . "<br>" . $row['fecha_final'] . "</td>";
    echo "<td data-label='Ubicación'>" . $row['ubicacion'] . "</td>";
    echo "<td data-label='Condición de acceso'>" . $row['condicion_acceso'] . "</td>";
    echo "<td data-label='Condición de reproducción'>" . $row['condicion_reproduccion'] . "</td>";
    echo "<td><a href='mostrarMas.php?id=" . $row['id_documento'] . "'>Ver Mas</a></td>";

    echo "</tr>";
}
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
//si no hay datos registrados
} else {
echo "No hay datos para mostrar.";
}
echo "</tbody>";
echo "</table>";
echo "</div>";

//cierra la conexión
    $datos_bd->close();
    ?>
</div>         
</body>
</html>
    


