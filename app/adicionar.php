<?php
// Incluir o arquivo de início de sessão
include('../bd/iniciosession.php');

// Inclui o arquivo de configuração do banco de dados
include_once('../bd/config.php');

// Recuperar o email do usuário logado
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

// Verifica se o formulário de categorias foi enviado
if (isset($_POST['submit_categoria'])) {
    // Recupera os dados do formulário de categorias e faz a devida limpeza
    $nome_categoria = mysqli_real_escape_string($conexao, $_POST['nome_categoria']);
    $cor = isset($_POST['cor']) ? mysqli_real_escape_string($conexao, $_POST['cor']) : '';

    // Insere os dados no banco de dados
    $result_categoria = mysqli_query(
        $conexao,
        "INSERT INTO categorias(nome_categoria, cor_categoria, idusu) 
        VALUES ('$nome_categoria','$cor', '$idusu')"
    );

    if ($result_categoria) {
        // Redireciona para a página de login após o cadastro bem-sucedido
        $categoria_sucesso = "Categoria cadastrada com sucesso!";
    } else {
        // Se houver um erro no banco de dados, exibe uma mensagem de erro ou faz um tratamento adequado
        $categoria_erro = "Ocorreu um erro ao cadastrar a categoria.";
    }
}

// Verifica se o formulário de produtos foi enviado
if (isset($_POST['submit_produto'])) {
    // Recupera os dados do formulário de produtos e faz a devida limpeza
    $nome_marca = mysqli_real_escape_string($conexao, $_POST['nome']);
    $categoria_id = mysqli_real_escape_string($conexao, $_POST['categoria']);
    $codigo = mysqli_real_escape_string($conexao, $_POST['codigo']);
    $tipo_venda = mysqli_real_escape_string($conexao, $_POST['tipovenda']);
    $preco = mysqli_real_escape_string($conexao, $_POST['preco']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

    // Insere os dados no banco de dados
    $result_produto = mysqli_query(
        $conexao,
        "INSERT INTO produtos(nome_marca, categoria_id, codigo, tipo_venda, preco, descricao, idusu) 
        VALUES ('$nome_marca','$categoria_id','$codigo','$tipo_venda','$preco','$descricao', '$idusu')"
    );

    if ($result_produto) {
        // Redireciona para a página de login após o cadastro bem-sucedido
        $produto_sucesso = "Produto cadastrado com sucesso!";
    } else {
        // Se houver um erro no banco de dados, exibe uma mensagem de erro ou faz um tratamento adequado
        $produto_erro = "Ocorreu um erro ao cadastrar o produto.";
    }
}

// Recuperar categorias do banco de dados do usuário da sessão atual
$query = "SELECT * FROM categorias WHERE idusu = '$idusu'";
$result = mysqli_query($conexao, $query);

// Array para armazenar as categorias recuperadas
$categorias = array();
while ($row = mysqli_fetch_assoc($result)) {
    $categorias[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/adicionar.css">
    <title>Adicionar</title>
</head>

<body>
    <?php include('../lateral-menu/lateral-menu.php')?>

    <?php if(isset($categoria_sucesso)): ?>
        <section class="alert-opacity">
            <div class="alert-success">
                <p>
                    <?php echo $categoria_sucesso; ?>
                    <a href="../app/adicionar.php"><i class="bi bi-x-circle-fill"></i></a>
                <p>
            </div>
        </section>
    <?php endif; ?>

    <?php if(isset($categoria_erro)): ?>
        <section class="alert-opacity">
            <div class="alert-success">
                <p>
                    <?php echo $categoria_erro; ?>
                    <a href="../app/adicionar.php"><i class="bi bi-x-circle-fill"></i></a>
                <p>
            </div>
        </section>
    <?php endif; ?>

    <?php if(isset($produto_sucesso)): ?>
        <section class="alert-opacity">
            <div class="alert-success">
                <p>
                    <?php echo $produto_sucesso; ?>
                    <a href="../app/adicionar.php"><i class="bi bi-x-circle-fill"></i></a>
                <p>
            </div>
        </section>
        <?php endif; ?>

    <div class="titulo">
        <h1>Adicionar</h1>
        <div class="border-user"></div>
    </div>

    <div class="area-preview">
        <div class="produto-image">
            <i class="bi bi-card-image"></i>
        </div>

        <div class="produto-categoria">
            <p>Cereais e Trigos </p>
        </div>

        <div class="produto-conteudo">
            <h1>Arroz Tio João</h1>
            <p>Marca cesur, vem em um pacotinho bem embalado e compacto, prontinho para fazer!</p>
        </div>

        <div class="produto-preco">
            <h1>R$ 10,50</h1>
            <p>Cód: 89076123000</p>
            <p>Unidade</p>
        </div>

        <div class="tag-preview">
            <p>Pré-visualização</p>
        </div>
    </div>

    <div class="btn-actions">
        <button>
            +<i class="bi bi-images"></i>
        </button>
    </div>

    <!-- Form categoria -->
    <div class="area-categoria">

        <div class="border-form"></div>
        <h1>Crie uma categoria</h1>

        <form action="" method="POST" class="form-categoria">
            <div class="categoria-item">
                <label for="name"></label><br>
                <input type="text" id="nome_categoria" name="nome_categoria" placeholder="Digite uma categoria" required />
            </div>

            <div class="categoria-item">
                <label for="color"></label><br>
                <input type="color" id="cor" name="cor" placeholder="Escolha uma cor" required />
            </div>

            <div class="btn-categoria">
                <button type="submit" name="submit_categoria">Criar</button>
            </div>
        </form>
    </div>

    <!-- Form produtos -->
    <div class="area-produtos">
        <div class="border-form"></div>
        <form action="" method="POST" class="form-produtos" id="cad-form">

            <section class="form-dados">

                <div class="dados-item">
                    <label for="name">Nome e marca</label><br>
                    <input type="text" id="nome" name="nome" placeholder="Digite o nome e marca do seu produto" required />
                </div>

                <div class="dados-item">
                    <label for="categoria">Categoria</label><br>
                    <select id="categoria" name="categoria" placeholder="Escolha uma categoria">
                        <option value="escolha">Escolha</option>
                        <?php foreach ($categorias as $categoria): ?>
                        <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nome_categoria']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="dados-item">
                    <label for="code">Código</label><br>
                    <input type="text" id="codigo" name="codigo" placeholder="Crie um código para o produto" required />
                </div>

                <div class="dados-item">
                    <label for="saletype">Vender por</label><br>
                    <select name="tipovenda" id="tipovenda" required>
                        <option value="escolha">Escolha</option>
                        <option value="unidade">Unidade</option>
                        <option value="pacote">Pacote</option>
                    </select>
                </div>

                <div class="dados-item">
                    <label for="price">Preço</label><br>
                    <input type="text" id="preco" name="preco" placeholder="R$ 0,00" required />
                </div>
            </section>

            <section class="form-descricao">
                <div class="descricao-item">
                    <label for="description">Descrição</label><br>
                    <textarea name="descricao" id="descricao" placeholder="Fale o que é seu produto em até 100 caracteres" required></textarea>
                </div>

                <div class="btn-enviarform">
                    <button type="submit" name="submit_produto">Novo</button>
                    <button type="submit" name="submit_produto">Salvar</button>
                </div>
            </section>

        </form>
    </div>
</body>

</html>
