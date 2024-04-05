<?php
// Inclui o arquivo de conexão
include('../bd/config.php');

// Verifica se os campos de email e senha foram enviados
if(isset($_POST['email']) && isset($_POST['senha'])){
    // Verifica se o campo de email está vazio
    if(empty($_POST['email'])) {
        $mensagemErro = "<p class='erro'>Preencha seu e-mail <a href='../login/login.php'>Tentar novamente</a> </p>";
    } 
    // Verifica se o campo de senha está vazio
    else if(empty($_POST['senha'])){
        $mensagemErro = "<p class='erro'>Preencha sua senha <a href='../login/login.php'>Tentar novamente</a> </p>";
    } else{
        // Escapa os valores recebidos para evitar SQL injection
        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $conexao->real_escape_string($_POST['senha']);

        // Consulta SQL para verificar se o usuário existe
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
        $sql_query = $conexao->query($sql) or die("Falha na execução do código SQL: " . $conexao->error );
    
        // Verifica se encontrou um usuário com o email e senha fornecidos
        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            // Inicia a sessão e armazena os dados do usuário nela
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha; 
            // Redireciona para o painel após o login bem-sucedido
            header('Location: ../app/index.php');
        } else {
            // Exibe mensagem de erro caso o login falhe
            $mensagemErro = "<p class='erro'>Falha ao logar! E-mail ou senha incorretos <a href='../login/login.php'>Tentar novamente</a> </p>";
        }
    }
}
?>