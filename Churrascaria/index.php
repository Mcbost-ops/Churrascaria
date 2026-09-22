<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>CHURRASCO DA SEMANA FARROUPILHA</h1>
    <?php
    $conn = new mysqli("localhost", "root", "", "churrasco");
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }
    $totalInscritos = $conn->query("SELECT COUNT(*) as total FROM participantes")->fetch_assoc()['total'];
    $confirmados = $conn->query("SELECT COUNT(*) as total FROM participantes WHERE confirmado = 1")->fetch_assoc()['total'];
    $naoConfirmados = $conn->query("SELECT COUNT(*) as total FROM participantes WHERE confirmado = 0")->fetch_assoc()['total'];
    $pagamentosRealizados = $conn->query("SELECT COUNT(*) as total FROM participantes WHERE pago = 1")->fetch_assoc()['total'];
    $pagamentosPendentes = $conn->query("SELECT COUNT(*) as total FROM participantes WHERE pago = 0")->fetch_assoc()['total'];
    $churrascoTradicional = $conn->query("SELECT COUNT(*) as total FROM participantes WHERE tipo_churrasco = 'tradicional'")->fetch_assoc()['total'];
    $churrascoVegetariano = $conn->query("SELECT COUNT(*) as total FROM participantes WHERE tipo_churrasco = 'vegetariano'")->fetch_assoc()['total'];
    ?>
    <p>Total de inscritos: <?php echo $totalInscritos; ?></p>
    <p>Confirmados: <?php echo $confirmados; ?></p>
    <p>Não confirmados: <?php echo $naoConfirmados; ?></p>
    <p>Pagamentos realizados: <?php echo $pagamentosRealizados; ?></p>
    <p>Pagamentos pendentes: <?php echo $pagamentosPendentes; ?></p>
    <p>Churrasco tradicional: <?php echo $churrascoTradicional; ?></p>
    <p>Vegetariano: <?php echo $churrascoVegetariano; ?></p>
    <a href="cadastrar.php">Nova inscrição</a>
    <a href="listar.php">Participantes</a>
    <a href="logout.php">Sair</a>
</body>
</html>
 página: index.php
deverá funcionar como página inicial do sistema após o login.
Apresente automaticamente informações obtidas do banco de dados.
