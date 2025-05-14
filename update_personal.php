<?php
include('db.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$mail = $_POST['mail'];
$numerointerno = $_POST['numerointerno'];
$seccion = $_POST['seccion'];

$foto = $_FILES['foto']['name'];
$foto_tmp = $_FILES['foto']['tmp_name'];
$ruta = 'images/';
$foto_nombre = $_POST['foto_actual']; // Mantener la foto actual si no se sube una nueva

if (!empty($foto)) {
    $foto_nombre = time() . "_" . basename($foto);
    move_uploaded_file($foto_tmp, $ruta . $foto_nombre);
}

$sql = "UPDATE personal SET 
        nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono', 
        mail='$mail', numerointerno='$numerointerno', seccion='$seccion', foto='$foto_nombre'
        WHERE id = $id";

$conn->query($sql);
header("Location: listar_personal.php");
