<?php
include('db.php');

$id = $_GET['id'];
$sql = "DELETE FROM personal WHERE id = $id";
$conn->query($sql);

header("Location: listar_personal.php");
