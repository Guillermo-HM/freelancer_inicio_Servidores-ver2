<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $baseDeDatos = "formulario";
    
    $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Diseños pruebas</title>

    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to load data from the database
            function loadData() {
                $.ajax({
                    url: 'fetch_data.php', // This is your PHP file to fetch data
                    type: 'GET',
                    success: function(data) {
                        $('#data_table').html(data); // Fill the table with the fetched data
                    }
                });
            }

            // Load data on page load
            loadData();

            // Form submission with AJAX
            $('#data_form').on('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting normally
                $.ajax({
                    url: 'insert_data.php', // This is your PHP file to insert data
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function() {
                        loadData(); // Reload the table after successful insert
                        $('#data_form')[0].reset(); // Reset the form fields
                    }
                });
            });
        });
    </script>
</head>
<body>
    <header>
        <h1>Juan Salas Freelancer</h1>
    </header>
    
    <form id="data_form" name="formulario" method="post">
            <fieldset>
                <legend>Registra tus datos</legend>

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" placeholder="Nombre" required><br><br>

                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" placeholder="Apellidos" required><br><br>

                <label for="edad">Edad:</label>
                <input type="number" name="edad" placeholder="Edad" required><br><br>

                <label for="calle">Calle:</label>
                <input type="text" name="calle" placeholder="Calle" required><br><br>

                <label for="numero">Número:</label>
                <input type="number" name="numero" placeholder="Número" required><br><br>

                <input type="submit" name="registro" value="Registrar">
            </fieldset>
        </form>

    <h2>Lista de Registros</h2>
    
    <table border="1" id="data_table">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Calle</th>
            <th>Número</th>
        </tr>
        <!-- Data will be loaded here -->
    </table>

    <footer>
            <p>Todos los derechos reservados. Juan Salas Freelancer</p>
    </footer>
</body>
</html>