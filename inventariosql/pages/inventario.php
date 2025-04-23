<?php
session_start();
if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    header('Location: login.php');
    exit;
}

require_once 'conexao.php';


$stmt = $pdo->query("SELECT * FROM mine");
$itens = $stmt->fetchAll(PDO::FETCH_ASSOC);



$slots_inventario = 27;
$slots_barra_rapida = 9;

$inventario = array_slice($itens, 0, $slots_inventario);
$barra_rapida = array_slice($itens, $slots_inventario, $slots_barra_rapida);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventário</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url('../assets/img/w2.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Minecraft', sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            color: white;
            text-align: center;
        }
        .inventario-grid, .barra-rapida {
            display: grid;
            gap: 5px;
        }
        .inventario-grid {
            grid-template-columns: repeat(9, 50px);
        }
        .barra-rapida {
            grid-template-columns: repeat(9, 50px);
            margin-top: 10px;
        }
        .slot {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid gray;
            position: relative;
        }
        .slot img {
            max-width: 40px;
            max-height: 40px;
        }
        .quantidade {
            position: absolute;
            bottom: 2px;
            right: 2px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            font-size: 12px;
            padding: 2px 4px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Inventário</h2>
        <div class="inventario-grid">
        <?php foreach ($inventario as $item): ?>
    <div class="slot">
        <img src="../assets/img/<?= htmlspecialchars($item['imagem']); ?>.png" alt="<?= htmlspecialchars($item['nome_item']); ?>">
        <span class="quantidade">x<?= htmlspecialchars($item['qtd_item']); ?></span>
    </div>
<?php endforeach; ?>

        </div>


        <a href="cadastro.php" class="btn btn-success mt-3">Adicionar Item</a>
        <a href="logout.php" class="btn btn-danger mt-3">Sair</a>
    </div>
</body>
</html>

