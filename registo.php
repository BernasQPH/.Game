<?php
require 'PHP/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $primeiro_nome = htmlspecialchars($_POST['primeiro_nome']);
    $ultimo_nome = htmlspecialchars($_POST['ultimo_nome']);
    $email = htmlspecialchars($_POST['email']);
    $numero_telemovel = htmlspecialchars($_POST['numero_telemovel']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilizadores (primeiro_nome, ultimo_nome, email, numero_telemovel, senha) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$primeiro_nome, $ultimo_nome, $email, $numero_telemovel, $senha])) {
        header("Location: login.php");
        exit;
    } else {
        echo "Erro no registo! Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'PHP/navbar.php'; ?>
    <div class="container mt-5">
        <h2>Registar</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="primeiro_nome" class="form-label">Primeiro Nome</label>
                <input type="text" class="form-control" id="primeiro_nome" name="primeiro_nome" required>
            </div>
            <div class="mb-3">
                <label for="ultimo_nome" class="form-label">Último Nome</label>
                <input type="text" class="form-control" id="ultimo_nome" name="ultimo_nome" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="numero_telemovel" class="form-label">Número de Telemóvel</label>
                <input type="text" class="form-control" id="numero_telemovel" name="numero_telemovel">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-primary">Registar</button>
        </form>
    </div>
</body>
</html>
