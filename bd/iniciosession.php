<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    // Redireciona para a página de login se o usuário não estiver autenticado
    header("Location: ../login/login.php");
    exit();
}

// Inclui o arquivo de configuração do banco de dados
include_once('../bd/config.php');

// Recupera o email do usuário da sessão
$email = $_SESSION['email'];

// Consulta o banco de dados para recuperar o ID do usuário
$query = "SELECT id, nome, nomeloja FROM usuarios WHERE email = '$email'";
$result = mysqli_query($conexao, $query);

// Verifica se a consulta foi bem-sucedida
if ($result && mysqli_num_rows($result) > 0) {
    // Extrai as informações do usuário da consulta
    $row = mysqli_fetch_assoc($result);
    $idusu = $row['id'];
    $nome_usuario = $row['nome'];
    $nome_loja = $row['nomeloja'];
} else {
    // Caso o usuário não seja encontrado, trata o erro
    $idusu = "ID não encontrado";
    $nome_usuario = "Usuário Desconhecido";
    $nome_loja = "Loja Desconhecida";
}

// Consulta o banco de dados para contar o número de funcionários associados ao ID do usuário
$query_count = "SELECT COUNT(*) AS total_funcionarios FROM funcionarios WHERE idusu = '$idusu'";
$result_count = mysqli_query($conexao, $query_count);

// Verifica se a consulta foi bem-sucedida
if ($result_count && mysqli_num_rows($result_count) > 0) {
    // Extrai o número total de funcionários da consulta
    $row_count = mysqli_fetch_assoc($result_count);
    $total_funcionarios = $row_count['total_funcionarios'];
} else {
    // Caso ocorra um erro na contagem, define o número total de funcionários como 0
    $total_funcionarios = 0;
}

// Consulta o banco de dados para contar o número de produtos associados ao ID do usuário
$query_countp = "SELECT COUNT(*) AS total_produtos FROM produtos WHERE idusu = '$idusu'";
$result_countp = mysqli_query($conexao, $query_countp);

// Verifica se a consulta foi bem-sucedida
if ($result_countp && mysqli_num_rows($result_countp) > 0) {
    // Extrai o número total de produtos da consulta
    $row_countp = mysqli_fetch_assoc($result_countp);
    $total_produtos = $row_countp['total_produtos'];
} else {
    // Caso ocorra um erro na contagem, define o número total de produtos como 0
    $total_produtos = 0;
}

?>
