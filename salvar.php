<?php
if(isset($_POST['nome']) && isset($_POST['turma']) && isset($_POST['telefone']) && isset($_POST['tipo_churrasco']) && isset($_POST['acompanhamento']) && isset($_POST['presenca_confirmada']) && isset($_POST['pagamento_realizado'])) {
    $nome = $_POST['nome'];
    $turma = $_POST['turma'];
    $telefone = $_POST['telefone'];
    $tipo_churrasco = $_POST['tipo_churrasco'];
    $acompanhamento = $_POST['acompanhamento'];
    $presenca_confirmada = $_POST['presenca_confirmada'];
    $pagamento_realizado = $_POST['pagamento_realizado'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=churrasco', 'root', '');

        $banco = $pdo->prepare("INSERT INTO participantes (nome, turma, telefone, tipo_churrasco, acompanhamento, presenca_confirmada, pagamento_realizado) VALUES (:nome, :turma, :telefone, :tipo_churrasco, :acompanhamento, :presenca_confirmada, :pagamento_realizado)");
        $banco->execute([
            ':nome' => $nome,
            ':turma' => $turma,
            ':telefone' => $telefone,
            ':tipo_churrasco' => $tipo_churrasco,
            ':acompanhamento' => $acompanhamento,
            ':presenca_confirmada' => $presenca_confirmada,
            ':pagamento_realizado' => $pagamento_realizado
        ]);

        echo "Cadastro realizado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }
} else {
    echo "Por favor, preencha todos os campos obrigatórios.";
}