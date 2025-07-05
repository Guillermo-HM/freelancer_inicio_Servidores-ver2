<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "formulario";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

// Consulta para obtener los datos
$sql = "SELECT nombre, apellidos, edad, calle, numero FROM personas";
$resultado = mysqli_query($enlace, $sql);

// Mostrar los datos en la tabla
if (mysqli_num_rows($resultado) > 0) {
    while($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>
                <td>" . htmlspecialchars($row["nombre"]) . "</td>
                <td>" . htmlspecialchars($row["apellidos"]) . "</td>
                <td>" . htmlspecialchars($row["edad"]) . "</td>
                <td>" . htmlspecialchars($row["calle"]) . "</td>
                <td>" . htmlspecialchars($row["numero"]) . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No hay registros encontrados.</td></tr>";
}
?>