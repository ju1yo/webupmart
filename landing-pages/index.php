<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/favicon.png">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/style.css">
    <title>home</title>
</head>

<body>
    <header>
        <?php include('../topo-menu/topo-menu.php')?>
    </header>

    <main class="main">

        <section class="section1">
            <div class="inicio">
                <h1>Gerencie sua loja com a gente!</h1>
                <p>
                    Otimize sua gestão com nosso sistema UpMart! Gerencie seu estoque, registre
                    vendas e emita notas fiscais de forma rápida e segura, tudo online. 
                    Simplifique sua rotina e potencialize seus resultados com nossa solução 
                    completa.
                </p>
                
                <div class="btn_inicio">
                    <a href="./planos.php">
                        <button> 
                            Ver planos <i class="ri-arrow-right-line"></i>
                        </button>
                    </a>

                    <a href="./servicos.php">
                        <button> 
                            Ver serviços <i class="ri-arrow-right-line"></i>
                        </button>
                    </a>
                </div>
            </div>

            <div class="img_inicio">
                    <img src="../landing-pages/img/inicio_logo.png">
                </div>
        </section>

        <section class="section2">

            <h1>Porque você tem que trabalhar com a UpMart</h1>

            <section class="bloco_card">
            <div class="card1">
                <h3>Estoque</h3>
                <h2>Estoque</h2>
                <p>
                    A Upmart oferece uma plataforma que
                    permite um gerenciamento eficiente 
                    do estoque, ajudando os donos de 
                    mercearias a controlar os níveis de
                    estoque, evitar desperdícios e 
                    garantir a disponibilidade dos 
                    produtos para os clientes.

                </p>
            </div>

            <div class="card2">
                <h3>PDV</h3>
                <h2>PDV</h2>
                <p>
                    Com um sistema de PDV integrado, 
                    a Upmart simplifica o processo de 
                    vendas, proporcionando uma 
                    experiência de checkout rápida e 
                    eficiente para os clientes, além 
                    de facilitar a operação dos 
                    funcionários.
                </p>
            </div>

            <div class="card3">
                <h3>Controle</h3>
                <h2>Controle</h2>
                <p>
                    A plataforma da Upmart registra 
                    todas as transações de vendas, 
                    fornecendo aos donos de mercearias 
                    insights sobre o desempenho 
                    financeiro do negócio. Isso permite 
                    o acompanhamento das vendas, análise 
                    de tendências e identificação de 
                    oportunidades de crescimento.
                </p>
            </div>
            </section>
            
        </section>

        <section class="section3">
            <div class="titulo">
                <h1>Nosso time</h1>
            </div>

            <section class="bloco_membros">
                <div class="membro1">
                    <img src="./img/imgjulyo.png">
                    <h2>Julyo Cesar</h2>
                    <h3>CEO</h3>
                </div>

                <div class="membro2">
                    <img src="./img/imgryan.png">
                    <h2>Ryan Mendes</h2>
                    <h3>Programador</h3>
                </div>
        
                <div class="membro3">
                    <img src="./img/imglevi.png">
                    <h2>Levi Padilha</h2>
                    <h3>Programador</h3>
                </div>

                <div class="membro4">
                    <img src="./img/imgvinicius.png">
                    <h2>Rian Vinicius</h2>
                    <h3>Programador</h3>
                </div>

                <div class="membro5">
                    <img src="./img/imged.png">
                    <h2>Edmundo Jr.</h2>
                    <h3>Marketing</h3>
                </div>
            </section>
        </section>

        <section class="section4">
            <div class="titulo">
                <h1>Parceiros</h1>
            </div>

            <section class="bloco_parceiros">

                <i class="ri-arrow-left-s-line"></i>
            
                <div class="parceiro1">
                    <img src="./img/parceiro1.png">
                </div>

                <div class="parceiro2">
                    <img src="./img/parceiro2.png">
                </div>

                <div class="parceiro3">
                    <img src="./img/parceiro3.png">
                </div>

                <div class="parceiro4">
                    <img src="./img/parceiro4.png">
                </div>

                <i class="ri-arrow-right-s-line"></i>
            </section>
        </section>

        <section class="section5">
            <div class="titulo">
                <h1>Crie sua conta :)</h1>
            </div>

            <form action="">

                <label for=""></label>
                <input type="text" id="name" name="name" placeholder="Nome" required>

                <label for=""></label>
                <input type="text" id="name" name="user" placeholder="Usuário" required>

                <label for=""></label><br>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <br>

                <label for=""></label>
                <input type="password" id="password" name="password" placeholder="Senha" required>

                <label for=""></label>
                <input type="password" id="conf-password" name="confirmed-password" placeholder="Confirmar senha" required>

                <br>
                <button type="submit">Criar</button>
            </form>

        </section>

    </main>

    <footer>
        <?php include('../footer/footer.php')?>
    </footer>
</body>
</html>