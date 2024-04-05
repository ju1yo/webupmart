<?php

// Defina a idade mínima permitida
$idadeMinima = 18;

// Defina as condições padrão da senha
function verificarSenhaPadrao($senha) {
    // A senha deve ter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais
    return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,}$/', $senha);
}

// Verifique se o formulário foi enviado
if(isset($_POST['submit']))
{
    // Inclua o arquivo de configuração do banco de dados
    include_once('../bd/config.php');

    // Recupere os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $aniversario = $_POST['aniversario'];
    $senha = $_POST['senha'];
    $nomeloja = $_POST['nomeloja'];

    // Verifique a idade do usuário
    $dataAtual = date('Y-m-d');
    $dataNascimento = date('Y-m-d', strtotime($aniversario));
    $diferencaAnos = date_diff(date_create($dataNascimento), date_create($dataAtual))->y;

    // Verifique se o email já está cadastrado
    $query_verificar_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado_verificar_email = mysqli_query($conexao, $query_verificar_email);

    if(mysqli_num_rows($resultado_verificar_email) > 0) {
        $mensagemErro = "Este email já está cadastrado. Por favor, escolha outro email.";
    } else {
        // Se a idade for menor que a idade mínima permitida, exiba uma mensagem de erro
        if ($diferencaAnos < $idadeMinima) {
            $mensagemErro = "Desculpe, você precisa ter pelo menos $idadeMinima anos para se cadastrar.";
        } else if (!verificarSenhaPadrao($senha)) {
            // Se a senha não atender às condições padrão, exiba uma mensagem de erro
            $mensagemErro = "A senha deve ter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais.";
        } else {
            // Insira os dados no banco de dados
            $result = mysqli_query(
                $conexao, "INSERT INTO usuarios(nome,nomeloja,email,aniversario,senha) 
                VALUES ('$nome','$nomeloja','$email','$aniversario','$senha')");

            // Redirecione para a página de login após o cadastro bem-sucedido
            header('Location: ../login/login.php');
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

    <?php include('../menu-voltar/menu-voltar.php');?>

    <?php if(isset($mensagemErro)): ?>
        <p class="erro"><?php echo $mensagemErro; ?></p>
    <?php endif; ?>

    <div class="area-comercial">
        <h1>Bem vindo a UpMart!</h1>
        <h2>
            Simplifique a gestão do seu mercadinho.
            Cadastre-se agora e vamos crescer juntos!
        </h2>
    </div>   

    <div class="area-form">
        <div class="titulo">
            <h1>Cadastre-se</h1>
        </div>

        <form action="cadastro.php" method="POST" class="cad-form" id="cad-form">

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
                <label for="namestore"></label>
                <i class="bi bi-basket2-fill"></i>
                <input 
                    type="text" 
                    id="nomeloja" 
                    name="nomeloja" 
                    placeholder="Nome do mercadinho"
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
                <label for="email"></label>
                <i class="bi bi-envelope-at-fill"></i>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="E-mail"
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