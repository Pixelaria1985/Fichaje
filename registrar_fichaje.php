<?php
include('db.php');

$numerointerno = $_POST['numerointerno'];
$res = $conn->query("SELECT * FROM personal WHERE numerointerno = '$numerointerno'");

if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    $id_personal = $row['id'];
    $foto = $row['foto'];

    // Último fichaje
    $last = $conn->query("SELECT tipo FROM fichaje WHERE personal_id = $id_personal ORDER BY fecha DESC LIMIT 1");
    $tipo = 'entrada';

    if ($last->num_rows > 0) {
        $last_tipo = $last->fetch_assoc()['tipo'];
        $tipo = $last_tipo === 'entrada' ? 'salida' : 'entrada';
    }

    // Registrar el fichaje
    $conn->query("INSERT INTO fichaje (personal_id, tipo) VALUES ($id_personal, '$tipo')");

    // Redirigir de vuelta a index.php con un mensaje de éxito
    header("Location: index.php?fichado=true&numerointerno=$numerointerno&tipo=$tipo");
} else {
    // Si el número no existe, redirigir con un mensaje de error
    header("Location: index.php?fichado=false");
}
?>
