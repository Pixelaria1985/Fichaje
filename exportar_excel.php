<?php
include('db.php');

// Verificamos si la fecha ha sido enviada a través de GET
if (isset($_GET['fecha'])) {
    $fecha = $_GET['fecha'];

    // Definir el nombre del archivo CSV
    $filename = "Registros_Fichaje_$fecha.csv";

    // Abrir el archivo para escribirlo en el navegador
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="' . $filename . '"');

    // Crear un puntero de archivo en la salida (php://output)
    $output = fopen('php://output', 'w');

    // Escribir los encabezados en el CSV
    fputcsv($output, ['Nombre', 'Apellido', 'Tipo', 'Fecha']);

    // Consultar los registros de fichaje para la fecha seleccionada
    $sql = "SELECT personal.nombre, personal.apellido, fichaje.tipo, fichaje.fecha 
            FROM fichaje 
            JOIN personal ON fichaje.personal_id = personal.id 
            WHERE DATE(fichaje.fecha) = '$fecha'
            ORDER BY fichaje.fecha DESC";

    $res = $conn->query($sql);

    // Si se encontraron registros, escribirlos en el CSV
    while ($row = $res->fetch_assoc()) {
        // Escribir cada fila de datos en el archivo CSV
        fputcsv($output, [$row['nombre'], $row['apellido'], $row['tipo'], $row['fecha']]);
    }

    // Cerrar el archivo
    fclose($output);
} else {
    echo "Por favor, selecciona una fecha para exportar.";
}
?>
