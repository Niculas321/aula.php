<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registro de Pessoa</title>
</head>
<?php
    session_start();

    if(!isset($_SESSION['logado'])){
        header('Location: telaLoginPessoa.php');
        exit();
    }


    $arquivo = fopen('pessoas.csv', 'r');

    $pessoas = [];
    while ($linha = fgetcsv($arquivo)){
        $arrayLinha = explode (';', $linha[0]);
        $pessoa = [
            'codigo' => $arrayLinha[0],
            'senha' => $arrayLinha[1],
            'nome' => str_replace('"', '', $arrayLinha[2]),
            'idade' => $arrayLinha[3],
            'sexo' => $arrayLinha[4]
        ];
        array_push($pessoas, $pessoa);
    }
    fclose($arquivo);
?>
<body>
    <?php require 'menu.html';?>
    <h1>Pessoas</h1>
    <table>
        <thead>
            <tr>
                <th>Nomes</th>
                <th>Senha</th>
                <th>Idade</th>
                <th>Sexo</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    foreach ($pessoas as $pessoa){ ?>
                    <tr>
                        <td><?php echo $pessoa['senha']; ?></td>
                        <td><?php echo $pessoa['nome']; ?></td>
                        <td><?php echo $pessoa['idade']; ?></td>
                        <td><?php echo $pessoa['sexo']; ?></td>
                    </tr>
                 <?php } ?>
        </tbody>
    </table>
</body>
</html>