<?php
    //iniciar sessão com possibilidade de puxar o email e nome do usuario
    include('../bd-funcionarios/iniciosession-funcionarios.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/pdv.css">
    <title>PDV</title>
</head>
<body>
    <?php include('../lateral-menu-funcionarios/lateral-menu.php')?>;
    
    <div>
        <?php echo "<h1>Bem vindo funcionário, $logado <h1>";?>
    </div>
</body>
</html>