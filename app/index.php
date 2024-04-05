<?php
    //iniciar sessão com possibilidade de puxar o email e nome do usuario
    include('../bd/iniciosession.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/style.css">
    <title>Perfil</title>
</head>
<body>

    <?php
        echo "<div class='titulo'> <h1>Bem vindo, $nome_usuario :)<h1> <div class='border-user'></div> </div>"
    ?>

    <section class="area-loja">
        <?php include('../lateral-menu/lateral-menu.php');?>
        
        <div class="logo-merc">
            <label for="arquivo"><i class="ri-image-add-line"></i></label>
            <input type="file" name="arquivo" id="arquivo">
        </div>

        <div>
            <?php echo "<h1>$nome_loja<h1>";?>
        </div>

        <div class="btn-loja">
            <a href="../app/gerenciar-funcionarios.php"><button>Funcionarios</button></a>
            <a href="../app/pdv.php"><button>PDV</button></a>
        </div>
    </section>

    <section class="area-info">

        <div class="card-funcionarios">
            <h2>Funcionarios cadastrados: </h2>
            <div class="inf-action">
                <a href="../cadastro-funcionarios/cadastro-funcionarios.php"><button>Adicionar</button></a>
                <?php echo "<h3>$total_funcionarios<h3>";?>
            </div>
        </div>

        <div class="card-produtos">
            <h2>Produtos adicionados: </h2>
            <div class="inf-action2">
                <a href="../app/adicionar.php"><button>Adicionar</button></a>
                <?php echo "<h3>$total_produtos<h3>";?>
            </div>
        </div>

        <div class="card-faturamento">
            <h2>Faturamento no ultimo mês: </h2>
            <h3>R$ 2.500,00</h3>
        </div>

    </section>

</body>
</html>