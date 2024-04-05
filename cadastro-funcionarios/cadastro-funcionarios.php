<?php
session_start();

// Defina a idade mínima permitida
$idadeMinima = 18;

// Função para verificar a senha conforme as condições padrão
function verificarSenhaPadrao($senha) {
    // A senha deve ter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais
    return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,}$/', $senha);
}

// Se não existir um email e uma senha na sessão, redireciona para a página de login
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../login/login.php');
    exit();
}

// Inclua o arquivo de configuração do banco de dados
include_once('../bd/config.php');

// Recupera o email do usuário logado
$email = $_SESSION['email'];

// Consulta o banco de dados para obter o id do usuário
$query = "SELECT id FROM usuarios WHERE email = '$email'";
$result = mysqli_query($conexao, $query);

// Verifica se a consulta foi bem-sucedida e se encontrou um usuário com o email especificado
if ($result && mysqli_num_rows($result) > 0) {
    // Extrai o id do usuário da consulta
    $row = mysqli_fetch_assoc($result);
    $idusu = $row['id'];
} else {
    // Se não encontrou nenhum usuário com o email especificado, define um id padrão
    $idusu = "ID não encontrado";
}

// Verifique se o formulário foi enviado
if (isset($_POST['submit'])) {
    // Recupere os dados do formulário
    $nome = $_POST['nome'];
    $aniversario = $_POST['aniversario'];
    $senha = $_POST['senha'];

    // Verifique a idade do usuário
    $dataAtual = date('Y-m-d');
    $dataNascimento = date('Y-m-d', strtotime($aniversario));
    $diferencaAnos = date_diff(date_create($dataNascimento), date_create($dataAtual))->y;

    // Se a idade for menor que a idade mínima permitida, exiba uma mensagem de erro
    if ($diferencaAnos < $idadeMinima) {
        $mensagemErro = "Desculpe, você precisa ter pelo menos $idadeMinima anos para se cadastrar.";
    } 
    // Se a senha não atender às condições padrão, exiba uma mensagem de erro
    else if (!verificarSenhaPadrao($senha)) {
        $mensagemErro = "A senha deve ter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais.";
    } else {
        // Verificar se o nome do funcionário já existe no banco de dados
        $query_verificar = "SELECT * FROM funcionarios WHERE nome = '$nome' AND idusu = '$idusu'";
        $resultado_verificar = mysqli_query($conexao, $query_verificar);

        if (mysqli_num_rows($resultado_verificar) > 0) {
            $mensagemErro = "O nome '$nome' já está cadastrado, tente novamente.";
        } else {
            // Insira os dados no banco de dados
            $result = mysqli_query(
                $conexao, "INSERT INTO funcionarios(nome, aniversario, senha, idusu) 
                VALUES ('$nome', '$aniversario', '$senha', '$idusu')");

            // Redirecione para a página de login após o cadastro bem-sucedido
            $mensagemSucesso = "<p class='sucesso'>Cadastrado com sucesso! <a href='../login-funcionarios/login-funcionarios.php'>Fazer login</a> </p>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>
<body>

    <?php include('../menu-voltar-app/menu-voltar-app.php');?>

    <?php if(isset($mensagemErro)): ?>
        <p class="erro-funcionarios"><?php echo $mensagemErro; ?></p>
    <?php endif; ?>

    <?php if(isset($mensagemSucesso)): ?>
        <p class="sucesso"><?php echo $mensagemSucesso; ?></p>
    <?php endif; ?>

    <div class="area-form">
        <div class="titulo">
            <h1>Cadastre um funcionário</h1>
        </div>

        <form action="cadastro-funcionarios.php" method="POST" class="cad-form" id="cad-form">

            <div class="cad-item">
                <label for="name"></label>
                <i class="bi bi-person-fill"></i>
                <input 
                    type="text" 
                    id="nome" 
                    name="nome" 
                    placeholder="Nome"
                    required
                />
            </div>

            <div class="cad-item">
                <label for="aniversario"></label>
                <i class="bi bi-cake2-fill"></i>
                <input 
                    type="date" 
                    id="aniversario" 
                    name="aniversario" 
                    placeholder="Aniversário"
                    required
                />
            </div>

            <div class="cad-item">
                <label for="password"></label>
                <i class="bi bi-lock-fill"></i>
                <input 
                    type="password" 
                    id="senha" 
                    name="senha" 
                    placeholder="Senha" 
                    required
                />
            </div>

            <div class="cad-item">
                <button type="submit" name="submit">Criar</button>
            </div>

        </form>
    </div>

    <div class="whatsapp-suporte">
        <a href="#">
            <i class="bi bi-whatsapp"></i><br>
            Fale conosco!
        </a>
    </div>
</body>
</html>