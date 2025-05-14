<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Consultar Registros de Fichaje</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Consultar Registros de Fichaje</h2>

    <!-- Formulario para seleccionar la fecha -->
    <form action="ver_registros.php" method="GET">
        <div class="mb-3">
            <label for="fecha" class="form-label">Selecciona la Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Buscar Registros</button>
    </form>

    <!-- Botón para exportar a CSV -->
    <?php
    if (isset($_GET['fecha'])) {
        $fecha = $_GET['fecha'];
        echo "<a href='exportar_excel.php?fecha=$fecha' class='btn btn-success mt-3'>Exportar a CSV</a>";

        // Mostrar los registros de fichaje para la fecha seleccionada
        $sql = "SELECT * FROM fichaje 
                JOIN personal ON fichaje.personal_id = personal.id
                WHERE DATE(fichaje.fecha) = '$fecha' ORDER BY fichaje.fecha DESC";
        $res = $conn->query($sql);

        if ($res->num_rows > 0) {
            echo "<table class='table table-bordered mt-4'>
                    <tr><th>Nombre</th><th>Apellido</th><th>Tipo</th><th>Fecha</th></tr>";
            while ($row = $res->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['nombre']}</td>
                        <td>{$row['apellido']}</td>
                        <td>{$row['tipo']}</td>
                        <td>{$row['fecha']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No se encontraron registros para esta fecha.</p>";
        }
    }
    ?>
</body>
</html>
