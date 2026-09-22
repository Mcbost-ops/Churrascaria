<?php
$conn = new mysqli("localhost", "root", "", "churrasco");
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$pesquisa = $_GET['pesquisa'] ?? '';
$pagamento = $_GET['pagamento'] ?? 'todos';
$presenca = $_GET['presenca'] ?? 'todos';

$sql = "SELECT * FROM participantes WHERE 1=1";
$params = [];
$types = "";

if (!empty($pesquisa)) {
    $sql .= " AND nome LIKE ?";
    $params[] = "%$pesquisa%";
    $types .= "s";
}
if ($pagamento === 'pagos') {
    $sql .= " AND pago = 1";
} elseif ($pagamento === 'pendentes') {
    $sql .= " AND pago = 0";
}
if ($presenca === 'confirmados') {
    $sql .= " AND confirmado = 1";
} elseif ($presenca === 'nao_confirmados') {
    $sql .= " AND confirmado = 0";
}

$stmt = $conn->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listagem</title>
</head>
<body>
    <h1>Curso Técnico de Informática para Internet</h1>
    <h2>Disciplina: Programação Web II</h2>
    <h3>Professor: Dr. Maurício Covolan Rosito</h3>
    <hr>

    <h2>Lista de Participantes</h2>
    <a href="cadastrar.php">Cadastrar Novo</a>
    <br><br>

    <form method="GET" action="">
        Pesquisar participante: <input type="text" name="pesquisa" value="<?= htmlspecialchars($pesquisa) ?>">
        
        Pagamento: 
        <select name="pagamento">
            <option value="todos" <?= $pagamento == 'todos' ? 'selected' : '' ?>>Todos</option>
            <option value="pagos" <?= $pagamento == 'pagos' ? 'selected' : '' ?>>Pagos</option>
            <option value="pendentes" <?= $pagamento == 'pendentes' ? 'selected' : '' ?>>Pendentes</option>
        </select>

        Presença: 
        <select name="presenca">
            <option value="todos" <?= $presenca == 'todos' ? 'selected' : '' ?>>Todos</option>
            <option value="confirmados" <?= $presenca == 'confirmados' ? 'selected' : '' ?>>Confirmados</option>
            <option value="nao_confirmados" <?= $presenca == 'nao_confirmados' ? 'selected' : '' ?>>Não confirmados</option>
        </select>

        <button type="submit">Filtrar</button>
        <a href="listar.php">Limpar</a>
    </form>
    <br>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Nome</th>
            <th>Turma</th>
            <th>Tipo</th>
            <th>Acompanhamento</th>
            <th>Presença</th>
            <th>Pagamento</th>
            <th>Ações</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nome']) ?></td>
                    <td><?= htmlspecialchars($row['turma']) ?></td>
                    <td><?= htmlspecialchars($row['tipo_churrasco']) ?></td>
                    <td><?= htmlspecialchars($row['acompanhamento']) ?></td>
                    <td><?= $row['confirmado'] ? 'Confirmado' : 'Não confirmado' ?></td>
                    <td><?= $row['pago'] ? 'Pago' : 'Pendente' ?></td>
                    <td>
                        <a href="editar.php?id=<?= $row['id'] ?>">Editar</a> | 
                        <a href="excluir.php?id=<?= $row['id'] ?>" onclick="return confirm('Deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="7">Nenhum registro encontrado.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
<?php $conn->close(); ?>