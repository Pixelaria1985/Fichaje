<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Agregar Personal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Agregar Personal</h2>
    <form action="insert_personal.php" method="POST" enctype="multipart/form-data">
        <!-- Campos -->
        <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" required>
        <input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2" required>
        <input type="text" name="direccion" placeholder="Dirección" class="form-control mb-2">
        <input type="text" name="telefono" placeholder="Teléfono" class="form-control mb-2">
        <input type="email" name="mail" placeholder="Correo" class="form-control mb-2">
        <input type="text" name="numerointerno" placeholder="Número Interno" class="form-control mb-2" required>
        <input type="text" name="seccion" placeholder="Sección" class="form-control mb-2">
        <input type="file" name="foto" class="form-control mb-3">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </form>
</body>
</html>
