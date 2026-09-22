<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "churrasco");
    if ($conn->connect_error) { die("Erro: " . $conn->connect_error); }

    $id = intval($_POST['id']);
    $nome = trim($_POST['nome']);
    $turma = trim($_POST['turma']);
    $telefone = trim($_POST['telefone']);
    $tipo = trim($_POST['tipo_churrasco']);
    $acompanhamento = trim($_POST['acompanhamento']);
    $confirmado = isset($_POST['confirmado']) ? 1 : 0;
    $pago = isset($_POST['pago']) ? 1 : 0;

    $stmt = $conn->prepare("UPDATE participantes SET nome=?, turma=?, telefone=?, tipo_churrasco=?, acompanhamento=?, confirmado=?, pago=? WHERE id=?");
    $stmt->bind_param("sssssiii", $nome, $turma, $telefone, $tipo, $acompanhamento, $confirmado, $pago, $id);
    $stmt->execute();
    
    $conn->close();
    header("Location: listar.php");
    exit();
}