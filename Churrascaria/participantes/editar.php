<?php
$conn = new mysqli("localhost", "root", "", "churrasco");
if ($conn->connect_error) { die("Erro: " . $conn->connect_error); }

$id = intval($_GET['id'] ?? 0);
$stmt = $conn->prepare("SELECT * FROM participantes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$p = $stmt->get_result()->fetch_assoc();
if (!$p) { die("Não encontrado."); }
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar</title>
</head>
<body>
    <h2>Editar Participante</h2>
    <form action="atualizar.php" method="POST">
        <input type="hidden" name="id" value="<?= $p['id'] ?>">
        Nome: <input type="text" name="nome" value="<?= htmlspecialchars($p['nome']) ?>" required><br><br>
        Turma: <input type="text" name="turma" value="<?= htmlspecialchars($p['turma']) ?>" required><br><br>
        Telefone: <input type="text" name="telefone" value="<?= htmlspecialchars($p['telefone']) ?>"><br><br>
        Tipo: 
        <select name="tipo_churrasco">
            <option value="Tradicional" <?= $p['tipo_churrasco'] == 'Tradicional' ? 'selected' : '' ?>>Tradicional</option>
            <option value="Vegetariano" <?= $p['tipo_churrasco'] == 'Vegetariano' ? 'selected' : '' ?>>Vegetariano</option>
        </select><br><br>
        Acompanhamento: <input type="text" name="acompanhamento" value="<?= htmlspecialchars($p['acompanhamento']) ?>"><br><br>
        <input type="checkbox" name="confirmado" value="1" <?= $p['confirmado'] ? 'checked' : '' ?>> Confirmado<br><br>
        <input type="checkbox" name="pago" value="1" <?= $p['pago'] ? 'checked' : '' ?>> Pago<br><br>
        <button type="submit">Salvar</button>
        <a href="listar.php">Voltar</a>
    </form>
</body>
</html>