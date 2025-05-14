<?php 
include('db.php');
$id = $_GET['id'];
$res = $conn->query("SELECT * FROM personal WHERE id = $id");
$row = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar Personal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Editar Datos del Personal</h2>
    <form action="update_personal.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" class="form-control mb-2" required>
        <input type="text" name="apellido" value="<?php echo $row['apellido']; ?>" class="form-control mb-2" required>
        <input type="text" name="direccion" value="<?php echo $row['direccion']; ?>" class="form-control mb-2">
        <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>" class="form-control mb-2">
        <input type="email" name="mail" value="<?php echo $row['mail']; ?>" class="form-control mb-2">
        <input type="text" name="numerointerno" value="<?php echo $row['numerointerno']; ?>" class="form-control mb-2" required>
        <input type="text" name="seccion" value="<?php echo $row['seccion']; ?>" class="form-control mb-2">
        <input type="file" name="foto" class="form-control mb-3">
        <button class="btn btn-success" type="submit">Guardar</button>
        <a href="listar_personal.php" class="btn btn-secondary">Volver</a>
    </form>
</body>
</html>
