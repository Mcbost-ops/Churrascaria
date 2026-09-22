<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>

</head>
<body>
    <form action="salvar.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br>
        <label for="turma">Turma:</label>
        <input type="text" id="turma" name="turma" required>
        <br>
        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" required>
        <br>
        <label for="tipo_churrasco">Tipo de Churrasco:</label>
        <select id="tipo_churrasco" name="tipo_churrasco" required>
            <option value="">Selecione</option>
            <option value="tradicional">Tradicional</option>
            <option value="vegetariano">Vegetariano</option>
        </select>
        <br>
        <label for="acompanhamento">Acompanhamento:</label>
        <input type="text" id="acompanhamento" name="acompanhamento">
        <br>
        <label for="presenca_confirmada">Presença Confirmada:</label>
        <select id="presenca_confirmada" name="presenca_confirmada" required>
            <option value="">Selecione</option>
            <option value="sim">Sim</option>
            <option value="nao">Não</option>
        </select>
        <br>
        <label for="pagamento_realizado">Pagamento Realizado:</label>
        <select id="pagamento_realizado" name="pagamento_realizado" required>
            <option value="">Selecione</option>
            <option value="sim">Sim</option>
            <option value="nao">Não</option>
        </select>
        <br><br>
        <button type="submit">Cadastrar</button>
    
</body>
<script src="script.js"></script>
</html>