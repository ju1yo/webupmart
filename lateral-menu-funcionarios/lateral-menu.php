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
            
            <li class="item-menu">
                <a href="../app-funcionarios/pdv.php">
                    <span class="icon-menu"><i class="bi bi-receipt"></i></span>
                    <span class="link-menu"> PDV</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="../bd-funcionarios/endsession.php">
                    <span class="icon-menu"><i class="bi bi-box-arrow-left"></i></span>
                    <span class="link-menu"> Sair</span>
                </a>
            </li>
        </ul>

    </nav>

    <script src="../lateral-menu/lateral-menu.js"></script>
</body>
</html>