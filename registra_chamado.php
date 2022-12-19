<?php
    session_start();

    // montagem do texto recebidos dos formularios
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;
    //abrindo arquivo
    $arquivo = fopen('arquivo.hd', 'a');
    //armazenando informações
    fwrite($arquivo, $texto);
    //fechando arquivo
    fclose($arquivo);

    header('location: abrir_chamado.php');

?>