<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Produtos</title>
</head>
<?php
    session_start();

    if(!isset($_SESSION['logado'])){
        header('Location: telalogin.php');
        exit();
    }


    $arquivo = fopen('products.csv', 'r');

    $produtos = [];
    while ($linha = fgetcsv($arquivo)){
        $arrayLinha = explode (';', $linha[0]);
        $produto = [
            'codigo' => $arrayLinha[0],
            'nome' => str_replace('"', '', $arrayLinha[1]),
            'preco' => $arrayLinha[2]
        ];
        array_push($produtos, $produto);
    }
    fclose($arquivo);
?>
<body>
    <?php require 'menu.html';?>
    <h1>Produtos</h1>
    <table>
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    foreach ($produtos as $produto){ ?>
                    <tr>
                        <td><?php echo $produto['nome']; ?></td>
                        <td><?php echo $produto['preco']; ?></td>
                    </tr>
                 <?php } ?>
        </tbody>
    </table>
</body>
</html>