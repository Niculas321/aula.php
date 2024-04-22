<?php 
    $acao = $_POST['acao'];

        if ($acao === 'entrar'){
            $usuario = $_POST['Usuario'];
            $senha = $_POST['senha'];
            $idade = $_POST['idade'];
            $sexo = $_POST['sexo'];

            
            session_start();
        
            if ($usuario === 'niculas' && $senha === '123' && $idade === '22' && $sexo === 'M') {
                $_SESSION['logado'] = true;
                header('Location: telaRegistroPessoa.php');
            }
            else {
                header('Location: telaLoginPessoa.php');
            }
            exit();
        }
        else if ($acao === 'cadastrar'){
            $usuario = $_POST['nome'];
            $senha = floatval($_POST['senha']);
            $idade = intval($_POST['idade']);
            $sexo = $_POST['sexo'];
            
            $arquivo = fopen('pessoas.csv', 'r');

            $pessoas = [];
            while ($linha = fgetcsv($arquivo)){
            $arrayLinha = explode (';', $linha[0]);
            $pessoa = [
                'codigo' => $arrayLinha[0],
                'nome' => str_replace('"', '',$arrayLinha[1]),
                'senha' => $arrayLinha[2],
                'idade' => $arrayLinha[3],
                'sexo' => $arrayLinha[4]
            ];
            array_push($pessoas, $pessoa);
            }
        fclose($arquivo);

    $arquivo = fopen('pessoas.csv', 'a');
    
    $pessoa = [
        count($pessoas) + 1,
        $usuario,
        $senha,
        $idade,
        $sexo
    ];
    fputcsv($arquivo, $pessoa, ';');

    fclose($arquivo);
    header('Location: telaRegistroPessoa.php');
    exit();
    }
?>