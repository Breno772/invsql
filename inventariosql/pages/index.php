<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Inventário</title>
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
            text-align: center;
            color: white;
        }
        .container {
            margin-top: 100px;
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            display: inline-block;
        }
        .gif-container {
            margin: 20px 0;
        }
        .btn-custom {
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            font-size: 20px;
            border-radius: 10px;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Bem-vindo ao Inventário do Minecraft!</h1>
        <p>Gerencie seus itens de forma fácil e rápida.</p>
        <div class="gif-container">
            <img src= "../assets/img/gif.gif" alt="Minecraft Animation" width="300">
        </div>
        <br>
        <a href="login.php" class="btn btn-custom">Entrar no Inventário</a>
    </div>

</body>
</html>
