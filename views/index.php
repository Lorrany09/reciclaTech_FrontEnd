<?php if (!isset($pdo)) require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciclaTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/carrossel.css">
    <link rel="stylesheet" href="../css/carrossel-sobre.css">
    <link rel="stylesheet" href="../css/funcionamento.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <section class="area-fundo">
        <?php require 'templates/header.php'; ?>
        <main>
            <section class="txt-img">
                <div class="texto">
                    <h3 class="sustentabilidade">Sustentabilidade</h3>
                    <h2>Seja a Diferença!</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta voluptatem tenetur impedit quos, accusantium officiis architecto ipsa quisquam accusamus necessitatibus iusto fugit? Sint sed velit non aperiam quis nam tempora.</p>
                    <div class="botoes-principais">
                        <a href="donate.php" class="quero-doar gradiente-bts-principais borda-gradiente botao-transicao">Quero Doar</a>
                        <a href="donation_list.php" class="quero-receber borda-gradiente botao-transicao">Quero Receber</a>
                    </div>
                </div>
                <div class="imagem">
                    <img src="../img/3D Recycling Icon with Isometric Design 1 (1).svg" alt="Simbolo da reciclagem">
                </div>
            </section>
            <section class="estatisticas">
                <div class="item-estatistica">
                    <div class="icone">
                        <img src="../img/iconeCpu.svg" alt="Desenho de uma cpu">
                    </div>
                    <div class="conteudo">
                        <h2>X kg de lixo eletrônico reciclado</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="item-estatistica">
                    <div class="icone">
                        <img src="../img/iconeSmartphone.svg" alt="Desenho de um smartphone">
                    </div>
                    <div class="conteudo">
                        <h2>Y dispositivos doados</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="item-estatistica">
                    <div class="icone">
                        <img src="../img/iconeUsers.svg" alt="Desenho representando os usuarios">
                    </div>
                    <div class="conteudo">
                        <h2>Z doadores ativos</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </section>
            <section class="pt-5">
                <div class="titulo-doacoes">
                    <h1 class="fw-bold">Doações da semana</h1>
                    <a href="donation_list.php" class="fw-bold">Ver todas ➝</a>
                </div>
                <div class="fundo-cards">
                    <button id="btn-voltar" class="carrossel-seta">←</button>
                    <div class="carrossel-container">
                        <div class="carrossel-track" id="trilho-doacoes">
                        </div>
                    </div>
                    <button id="btn-avancar" class="carrossel-seta">→</button>
                </div>
            </section>
    </section>

    <section class="sobreRanking" id="rank">
        <div class="informacoes">
            <h3>Doe e ganhe pontos!</h3>
            <h2>Ranking dos doadores</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam tenetur itaque reiciendis incidunt labore accusamus, fuga velit temporibus vel quo magni accusantium harum, unde sapiente, consequatur nesciunt animi amet obcaecati?lorem</p>
            <img src="../img/top-users.png" alt="ranking">
            <div class="botoesRanking">
                <a href="" class="doarRanking">Quero Doar</a>
                <a href="" class="verRaking"><span>Ver Ranking</span></a>
            </div>
        </div>
        <div class="previaRanking">
            <div class="cabecalho">
                <h2>Maiores doadores</h2>
                <p>Doe para subir no rank</p>
                <img src="../img/trophy.png" alt="Desenho de um troféu">
            </div>
            <div class="cabecalho-tabela">
                <span>Pos.</span>
                <span>Doador(a)</span>
                <span class="doacoes">Qtd. Doações</span>
                <span>Pontuação</span>
            </div>
            <div class="ranking"></div>
        </div>
    </section>

    <section class="como-funciona">
        <div class="intro-como-funciona">
            <h6 class="borda-gradiente botao-transicao gradiente-bts-principais">Simples e fácil</h6>
            <h1 class="fw-bold">Como funciona?</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="como-funciona-cards">
            <div class="card">
                <div class="imagem-card-container">
                    <img src="" alt="">
                </div>
                <div class="funciona-cards-texto">
                    <h4 class="fw-bold">Cadastre o dispositivo</h4>
                    <p class="descricao">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis qui consequuntur sapiente est quibusda</p>
                </div>
            </div>
            <div class="card">
                <div class="imagem-card-container">
                    <img src="" alt="">
                </div>
                <div class="funciona-cards-texto">
                    <h4 class="fw-bold">Encontre ou seja encontrado</h4>
                    <p class="descricao">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate asperiores distinctio quasi tempore, mo. </p>
                </div>
            </div>
            <div class="card">
                <div class="imagem-card-container">
                    <img src="" alt="">
                </div>
                <div class="funciona-cards-texto">
                    <h4 class="fw-bold">Retire ou envie</h4>
                    <p class="descricao">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse aut illo magni! Consequuntur atque dolores,? </p>
                </div>
            </div>
        </div>
        <div class="ecopontos">
            <div class="container-mapa">
            </div>
            <div class="ecopontos-descricao">
                <h1 class="fw-bold"><strong>Ecopontos</strong> na Cidade</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                <div class="descricao-legenda">
                    <h2>Legenda</h2>
                    <div class="item-legenda d-flex">
                        <img class="imagem-legenda" src="../img/Disc.svg" alt="icone de CD">
                        <div>
                            <h3><strong>Sua localização</strong></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                    </div>
                    <div class="item-legenda d-flex">
                        <img class="imagem-legenda" src="../img/Map-pin.svg" alt="icone de marcação em mapas">
                        <div>
                            <h3><span>Ecoponto</span></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                    </div>
                    <div class="item-legenda d-flex">
                        <img class="imagem-legenda" src="../img/casinha.svg" alt="icone de casinha">
                        <div>
                            <h3><span>Instituições Sociais/ONG's</span></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="cardsNotebooks-doacao">
        <div class="cardItensDoar">
            <h2>O que doar?</h2>
            <div class="card-doacao">
                <ul id="lista"></ul>
                <img id="foto" class="primeiraFoto" src="../img/celulares.webp" alt="Imagem de celulares">
                <a href="" class="btn-saiba-mais">Saiba mais</a>
            </div>
        </div>
        <div class="cardItensNaoDoar">
            <h2>O que não doar?</h2>
            <div class="card-doacao">
                <ul id="lista2"></ul>
                <img id="foto2" class="segundaFoto" src="../img/pilhas.webp" alt="Imagem de pilhas usadas">
                <a href="" class="btn-saiba-mais2">Saiba mais</a>
            </div>
        </div>
    </section>

    <section class="porque-doar">
        <div class="porqueDoar">
            <h3>Por que doar?</h3>
            <h2>Benefícios para todos</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam tenetur itaque reiciendis incidunt labore accusamus, fuga velit temporibus vel quo magni accusantium harum, unde sapiente, consequatur nesciunt animi amet obcaecati?lorem</p>
            <div class="caixa">
                <div class="caixinha">
                    <img src="../img/icon-sustentabilidade.png" alt="Icone de sustentabilidade">
                    <h4>Sustentabilidade</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                </div>
                <div class="caixinha">
                    <img src="../img/icon-trophy.png" alt="Icone de trofeu">
                    <h4>Gamificação</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                </div>
                <div class="caixinha">
                    <img src="../img/icon-impactoSocial.png" alt="Icone de impacto social">
                    <h4>Impacto Social</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                </div>
            </div>
        </div>
        <figure>
            <img src="../img/section-img.png" alt="">
        </figure>
    </section>
    <section class="sobre">
        <h1 class="fw-bold">Mais sobre o descarte eletrônico</h1>
        <div class="carrossel-wrapper">
            <button id="btn-voltar-sobre" class="carrossel-seta">&lt;</button>
            <div class="carrossel-container">
                <div class="carrossel-track" id="trilho-sobre">
                </div>
            </div>

            <button id="btn-avancar-sobre" class="carrossel-seta">&gt;</button>
        </div>
    </section>
    </main>

    <?php require 'templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/previaRanking.js"></script>
    <script src="../js/infoFooter.js"></script>
    <script src="../js/dropdown.js"></script>
    <script src="../js/conteudoCards.js"></script>
    <script src="../js/carrossel.js"></script>
    <script src="../js/carrossel-sobre.js"></script>
</body>

</html>