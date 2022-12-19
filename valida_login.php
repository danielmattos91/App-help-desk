<?php

    session_start();


    //autenticação dos usuarios
    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_pefil_id = null;

    $perfis = array(1 => 'administrativo', 2 => 'usuario');

    //usuario do sistema
    $usuarios_app = array(
        array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '123456', 'perfild_id' => 1),
        array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => 'abcd', 'perfild_id' => 1),
        array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => 'abcd', 'perfild_id' => 2),
        array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => 'abcd', 'perfild_id' => 2),
    );

    foreach($usuarios_app as $user) {
        
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_pefil_id = $user['perfil_id'];
        }

    }

    if($usuario_autenticado) {
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_pefil_id;
        header('location: home.php');
    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('location: index.php?login=erro');
    }

?>