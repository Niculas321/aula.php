<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Pessoa</title>
</head>
<?php
    session_start();

    session_destroy();

    if(!isset($_SESSION['logado'])){
        header('Location: telaLoginPessoa.php');
        exit();
    }
?>
<body>
    <?php require 'menu.html';?>
    <h1>Cadastro de Pessoas</h1>
        <form action="controllerPessoa.php" method= "post">
            <label for="nome">Nome da Pessoa</label>
            <br>
            <input type="text" name="nome" id="nome">
            <br>
            <label for="senha">Senha</label>
            <br>
            <input type="password" name="senha" id="senha">
            <br>
            <label for="idade">Idade</label>
            <br>
            <input type="number" name="idade" id="idade" step="any">
            <br>
            <label for="sexo">Sexo</label>
            <br>
            <input type="sexo" name="sexo" id="sexo" step="any">
            <br>
            <br>
            <input type="hidden" name="acao" id="acao" value="cadastrar">
            <input type="submit" value="Cadastrar">
        </form>
</body>
</html>