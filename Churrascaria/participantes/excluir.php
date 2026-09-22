<?php
$id = intval($_GET['id'] ?? 0);
if ($id > 0) {
    $conn = new mysqli("localhost", "root", "", "churrasco");
    if ($conn->connect_error) { die("Erro: " . $conn->connect_error); }

    $stmt = $conn->prepare("DELETE FROM participantes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $conn->close();
}
header("Location: listar.php");
exit();