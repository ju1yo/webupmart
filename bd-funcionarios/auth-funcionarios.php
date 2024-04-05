<?php
// Inclui o arquivo de conexão
include('../bd/config.php');

// Verifica se os campos de email e senha foram enviados
if(isset($_POST['nome']) && isset($_POST['senha'])){
    // Verifica se o campo de email está vazio
    if(empty($_POST['nome'])) {
        $mensagemErro = "<p class='erro'>Preencha seu nome <a href='../login-funcionarios/login-funcionarios.php'>Tentar novamente</a> </p>";
    } 
    // Verifica se o campo de senha está vazio
    else if(empty($_POST['senha'])){
        $mensagemErro = "<p class='erro'>Preencha sua senha <a href='../login-funcionarios/login-funcionarios.php'>Tentar novamente</a> </p>";
    } else{
        // Escapa os valores recebidos para evitar SQL injection
        $nome = $conexao->real_escape_string($_POST['nome']);
        $senha = $conexao->real_escape_string($_POST['senha']);

        // Consulta SQL para verificar se o usuário existe
        $sql = "SELECT * FROM funcionarios WHERE nome = '$nome' AND senha = '$senha' ";
        $sql_query = $conexao->query($sql) or die("Falha na execução do código SQL: " . $conexao->error );
    
        // Verifica se encontrou um usuário com o email e senha fornecidos
        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            // Inicia a sessão e armazena os dados do usuário nela
            session_start();
            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha; 
            // Redireciona para o painel após o login bem-sucedido
            header('Location: ../app-funcionarios/pdv.php');
        } else {
            // Exibe mensagem de erro caso o login falhe
            $mensagemErro = "<p class='erro'>Falha ao logar! nome ou senha incorretos <a href='../login-funcionarios/login-funcionarios.php'>Tentar novamente</a> </p>";
        }
    }
}
?>