<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
</head>
<?php
    session_start();

    session_destroy();

    if(!isset($_SESSION['logado'])){
        header('Location: telalogin.php');
        exit();
    }
?>
<body>
    <?php require 'menu.html';?>
    <h1>Cadastro de Produto</h1>
    <form action="controller.php" method= "post">
        <label for="nome">Nome do Produto</label>
        <br>
        <input type="text" name="nome" id="nome">
        <br>
        <label for="preco">Preço</label>
        <br>
        <input type="number" name="preco" id="preco" step="any">
        <br>
        <br>
        <input type="hidden" name="acao" id="acao" value="cadastrar">
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>