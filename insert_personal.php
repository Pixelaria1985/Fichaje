<?php
include('db.php');

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
$foto_nombre = 'random.png';

if (!empty($foto)) {
    $foto_nombre = time() . "_" . basename($foto);
    move_uploaded_file($foto_tmp, $ruta . $foto_nombre);
}

$sql = "INSERT INTO personal (nombre, apellido, direccion, telefono, mail, numerointerno, seccion, foto)
        VALUES ('$nombre', '$apellido', '$direccion', '$telefono', '$mail', '$numerointerno', '$seccion', '$foto_nombre')";

$conn->query($sql);
header("Location: listar_personal.php");
