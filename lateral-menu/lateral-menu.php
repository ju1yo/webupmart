<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../lateral-menu/lateral-menu.css">
    <title>Inicio</title>
</head>
<body>
    <nav class="lateral-menu">

        <div class="btn-burger">
            <i class="bi bi-list" id="btn-brg"></i>
        </div>

        <ul>
            <li class="item-menu" id="item-perfil">
                <a href="../app/index.php">
                    <span class="icon-menu"><i class="bi bi-person"></i></span>
                    <span class="link-menu">Perfil</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="../app/adicionar.php">
                    <span class="icon-menu"><i class="bi bi-cart-plus"></i></span>
                    <span class="link-menu">Adicionar</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="../app/produtos.php">
                    <span class="icon-menu"><i class="bi bi-cart-check"></i></span>
                    <span class="link-menu">Produtos</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="../app/desempenho.php">
                    <span class="icon-menu"><i class="bi bi-graph-up-arrow"></i></span>
                    <span class="link-menu">Desempenho</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="../app/pdv.php">
                    <span class="icon-menu"><i class="bi bi-receipt"></i></span>
                    <span class="link-menu"> PDV</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="../bd/endsession.php">
                    <span class="icon-menu"><i class="bi bi-box-arrow-left"></i></span>
                    <span class="link-menu"> Sair</span>
                </a>
            </li>
        </ul>

    </nav>

    <script src="../lateral-menu/lateral-menu.js"></script>
</body>
</html>