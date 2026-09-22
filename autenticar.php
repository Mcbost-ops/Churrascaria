<?php
//Se o email e senha estivere corretos session_start();
if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $banco = $sql->prepare("SELECT * FROM usuarios WHERE email = :email");
    $banco->execute([':email' => $email]);
    $usuario = $banco->fetch(PDO::FETCH_ASSOC);


    if ($usuario && password_verify($senha, $usuario['senha'])) {
        session_start();
        $_SESSION['email'] = $email;
        header('Location: dashboard.php'); 
        exit();
    } else {
        echo 'Email ou senha incorretos.';
    }
} else {
    echo 'Por favor, preencha todos os campos.';
}


