<?php

    $dbhost = 'Localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $dbname = 'bdcadastro';

    $conexao = new mysqli($dbhost,$dbusername,$dbpassword,$dbname);

    // if($conexao->connect_errno)
    // {
    //    echo 'Erro';
    // }
    // else
    // {
    //   echo 'Conexão efetuada com sucesso';
    // }

?>