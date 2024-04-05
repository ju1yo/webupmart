<?php
    session_start();
    //print_r($_SESSION);

    //Se não existir um email e uma senha
    if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true))
    {
        //Redirecionar para a pagina de login e destruir qualquer email ou senha na sessão
        unset($_SESSION['nome']);
        unset($_SESSION['senha']); 
        header('Location: ../login-funcionarios/login-funcionarios.php');
        exit();
    }
    else
    {
        include('../bd/config.php');
        $logado = $_SESSION['nome'];
    }
?>