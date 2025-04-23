<?php
session_start();

// Definir as constantes para o login
const USUARIO = 'ReBon';
const SENHA = '2208';

// Verifica se o usuário ou senha estão corretos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';
    
    if ($user === USUARIO && $pass === SENHA) {
        $_SESSION['logado'] = true;
        header('Location: inventario.php');
        exit;
    } else {
        $erro = 'Usuário ou senha incorretos!';
    }
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inventário</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @font-face {
            font-family: 'Minecraft';
            src: url('../assets/fonts/minecraft.ttf') format('truetype');
        }
        body {
            background: url('../assets/img/background.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Minecraft', sans-serif;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border-radius: 10px;
            text-align: center;
        }
        .login-container img {
            width: 200px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="../assets/img/minecraft-logo.png" alt="Minecraft Logo">
        <h2>Login</h2>
        <?php if (isset($erro)) echo "<p style='color: red;'>$erro</p>"; ?>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Usuário" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn btn-success">Entrar</button>
        </form>
    </div>
</body>
</html>
