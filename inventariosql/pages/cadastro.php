
<?php
session_start();
if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    header('Location: login.php');
    exit;
}

require_once 'conexao.php';

// Verifica se foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $quantidade = (int) trim($_POST['quantidade'] ?? 0);
    $imagem = trim($_POST['imagem'] ?? '');

    if (!empty($nome) && $quantidade > 0 && !empty($imagem)) {
        $stmt = $pdo->prepare("SELECT * FROM mine WHERE nome_item = ?");
        $stmt->execute([$nome]);
        $itemExistente = $stmt->fetch();

        if ($itemExistente) {
            $novaQtd = $itemExistente['qtd_item'] + $quantidade;
            $update = $pdo->prepare("UPDATE mine SET qtd_item = ? WHERE nome_item = ?");
            $update->execute([$novaQtd, $nome]);
        } else {
            $insert = $pdo->prepare("INSERT INTO mine (nome_item, qtd_item, imagem) VALUES (?, ?, ?)");
            $insert->execute([$nome, $quantidade, $imagem]);
        }

        header('Location: inventario.php');
        exit;
    } else {
        $erro = "Preencha todos os campos corretamente!";
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Item</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url('../assets/img/w1.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Minecraft', sans-serif;
        }
        .container {
            max-width: 400px;
            margin-top: 100px;
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Cadastro de Item</h2>
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"> <?= $erro; ?> </div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Item:</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" class="form-control" min="1" required>
            </div>
            <div class="mb-3">
    <label for="imagem" class="form-label">Nome da Imagem (sem extensão):</label>
    <input type="text" name="imagem" id="imagem" class="form-control" required>
</div>

            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="inventario.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
