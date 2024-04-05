<?php
    include('../bd/auth.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../login/style.css">
    <title>Login</title>
</head>
<body>
    <header>
        <?php include('../topo-menu/topo-menu.php')?>
    </header>

    <?php if(isset($mensagemErro)): ?>
        <p class="erro"><?php echo $mensagemErro; ?></p>
    <?php endif; ?>

    <div class="area-login">
        <div class="titulo">
            <h1>Login</h1>
        </div>

        <form action="" method="POST" class="login-form" id="login-form">

            <div class="login-item">
                <label for="email"></label>
                <i class="bi bi-envelope-at-fill"></i>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="E-mail"
                />
            </div>

            <div class="login-item">
                <label for="password"></label>
                <i class="bi bi-lock-fill"></i>
                <input 
                    type="password" 
                    id="senha" 
                    name="senha" 
                    placeholder="Senha" 
                />
            </div>

            <input class="input-enviar" type="submit" name="submit" value="Entrar">

        </form>

        <div class="enviar-item">
            <a href="../cadastro/cadastro.php"><button>Cadastre-se</button></a>
        </div>

        <div class="enviar-funcionario">
            <a href="../login-funcionarios/login-funcionarios.php"><button>Funcionários</button></a>
        </div>

    </div>

    <div class="whatsapp-suporte">
        <a href="#">
            <i class="bi bi-whatsapp"></i><br>
            Fale conosco!
        </a>
    </div>

</body>
</html>