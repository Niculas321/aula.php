<?php 
    $acao = $_POST['acao'];

        if ($acao === 'entrar'){
            $usuario = $_POST['Usuario'];
            $senha = $_POST['senha'];

            session_start();

            if ($usuario === 'niculas' && $senha === '123') {
                $_SESSION['logado'] = true;
                header('Location: telaRegistroPessoa.php');
            }
            else {
                header('Location: telaLoginPessoa.php');
            }
            exit();
        }
        else if ($acao === 'cadastrar'){
            $descricao = $_POST['nome'];
            $preco = floatval($_POST['preco']);

            $arquivo = fopen('products.csv', 'r');

    $produtos = [];
    while ($linha = fgetcsv($arquivo)){
        $arrayLinha = explode (';', $linha[0]);
        $produto = [
            'codigo' => $arrayLinha[0],
            'nome' => $arrayLinha[1],
            'preco' => $arrayLinha[2]
        ];
        array_push($produtos, $produto);
    }
    fclose($arquivo);

    $arquivo = fopen('products.csv', 'a');
    
    $produto = [
        count($produtos) + 1,
        $descricao,
        $preco
    ];
    fputcsv($arquivo, $produto, ';');

    fclose($arquivo);
    header('Location: telaProdutos.php');
    exit();
    }
?>