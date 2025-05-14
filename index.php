<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Fichaje</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Fichaje</h2>
    <form action="registrar_fichaje.php" method="POST" class="mb-4">
        <div class="mb-3">
            <label for="numerointerno" class="form-label">Número Interno</label>
            <input type="text" name="numerointerno" class="form-control" placeholder="Ingrese su Número Interno" required>
        </div>
        <button type="submit" class="btn btn-primary">Fichar</button>
    </form>

    <?php
    if (isset($_GET['fichado']) && $_GET['fichado'] == 'true') {
        // Mostrar mensaje de éxito después de fichar
        $numerointerno = $_GET['numerointerno'];
        $res = $conn->query("SELECT * FROM personal WHERE numerointerno = '$numerointerno'");

        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $tipo_fichaje = $_GET['tipo']; // Entrada o salida
            $color = ($tipo_fichaje == 'entrada') ? 'success' : 'danger';

            echo "<div class='alert alert-$color mt-3'>
                    <strong>{$row['nombre']} {$row['apellido']}</strong> ha $tipo_fichaje.
                    <br><img src='images/{$row['foto']}' width='100' class='img-thumbnail'>
                  </div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Número interno no encontrado.</div>";
        }
    }
    ?>
    
</body>
</html>
