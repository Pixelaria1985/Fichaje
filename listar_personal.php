<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Lista de Personal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Listado de Personal</h2>
    <a href="add_personal.php" class="btn btn-primary mb-3">Agregar Nuevo</a>
    <table class="table table-bordered">
        <tr><th>Nombre</th><th>Apellido</th><th>Foto</th><th>Acciones</th></tr>
        <?php
        $res = $conn->query("SELECT * FROM personal");
        while ($row = $res->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['nombre']}</td>
                    <td>{$row['apellido']}</td>
                    <td><img src='images/{$row['foto']}' width='50'></td>
                    <td>
                        <a href='edit_personal.php?id={$row['id']}' class='btn btn-warning btn-sm'>Editar</a>
                        <a href='delete_personal.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Eliminar?\")'>Eliminar</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
