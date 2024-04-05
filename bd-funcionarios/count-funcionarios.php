<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    // Redireciona para a página de login se o usuário não estiver autenticado
    header("Location: login.php");
    exit();
}

// Inclui o arquivo de configuração do banco de dados
include_once('../bd/config.php');

// Recupera o email e senha do usuário da sessão
$email = $_SESSION['email'];

// Consulta o banco de dados para recuperar o ID do usuário
$query = "SELECT id FROM usuarios WHERE email = '$email' ";
$result = mysqli_query($conexao, $query);

// Verifica se a consulta foi bem-sucedida
if ($result && mysqli_num_rows($result) > 0) {
    // Extrai o ID do usuário da consulta
    $row = mysqli_fetch_assoc($result);
    $idusu = $row['id'];
} else {
    // Caso o usuário não seja encontrado, trata o erro
    echo "Erro: Usuário não encontrado!";
    exit();
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

echo $total_funcionarios;
?>
