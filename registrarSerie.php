<!DOCTYPE html>
<html>
<head>
    <title>Ingresar serie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body{
            background: linear-gradient(45deg, #289e92, #c22a2c);
            background-repeat: no-repeat;
            height: max
        }
        h1{
            color: antiquewhite;
            font-style: oblique;
        }
        .btn-custom{
            background-color: #c22a2c;
            color: antiquewhite;
        }

        .custom-form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-label {
            color: #c22a2c;
            font-weight: bold;
        }

        .custom-input {
            width: 90%;
        }

.custom-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            border: 1px solid #c22a2c;
        }

        .custom-table th, .custom-table td {
            padding: 10px;
            border: 2px solid #c22a2c;
            text-align: center;
            color: antiquewhite;
            font-style: oblique;
        }
    </style>
</head>
<body>
<?php
//include("cabecera.php");
?>
    <br>
    <h1 class="text-center">Ingrese una nueva serie</h1>

<!--formulario para registrar datos-->
<div class="container mt-5 custom-form">
    <form action="consultaRegistrarSerie.php" method="post">
        
        <div class="form-group">
        <label class="custom-label text-center" for="nombre_serie">Nombre:</label>
        <input class="custom-input" type="text" id="nombre_serie" name="nombre_serie" required><br><br>
        <!--<label class="custom-label text-center" for="nombre_subserie">Subserie:</label>
        <input class="custom-input" type="text" id="nombre_subserie" name="nombre_subserie" required><br><br>-->
        <label for="subserie" class="custom-label text-center">Subserie:</label>
        <select name="subserie" required><br></br>
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>
        <br></br>
        <label for="subfondo" class="custom-label text-center">Subfondo:</label>
        <select name="subfondo" required><br></br>
            <option value="Legales">Legales</option>
            <option value="Hacienda">Hacienda</option>
            <option value="Recursos humanos">Recursos humanos</option>
            <option value="Seguridad urbana">Seguridad urbana</option>
            <option value="Prensa, difusión y protocolo">Prensa, difusión y protocolo</option>
            <option value="Registro civil">Registro civil</option>
            <option value="Obras públicas y privadas">Obras públicas y privadas</option>
            <option value="Catastro municipal">Catastro municipal</option>
            <option value="Cultura y educación">Cultura y educación</option>
        </select>

        <br></br>
        </div>
        <button type="submit" class="btn btn-custom">Guardar</button>
    </form>
</div>

<?php
    include("conexion.php");

    $sql = "SELECT * FROM serie";
    $result = $datos_bd->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='custom-table'>
        <tr>
            <th>Series existentes</th>
            <th>Subserie</th>
            <th>Subfondo</th>
        </tr>";
    }
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["nombre_serie"] . "</td> 
                <td>" . $row["subserie"] . "</td>
                <td>" . $row["subfondo"] . "</td>
                </tr>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($datos_bd);
    ?>

</body>
</html>