<?php if (!isset($pdo)) require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking de Doadores | ReciclaTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/ranking.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="ranking-page">
    <section class="ranking-topo">

        <?php require 'templates/header.php'; ?>

        <div class="ranking-hero">
            <div class="ranking-hero-texto">
                <span class="ranking-etiqueta"><i class="bi bi-trophy-fill"></i> Comunidade em ação</span>
                <h2>Ranking de doadores</h2>
                <p>Cada equipamento doado gera pontos e fortalece uma rede mais sustentável. Acompanhe sua posição e continue fazendo a diferença.</p>
            </div>
            <aside class="minha-posicao" aria-label="Sua posição no ranking">
                <div class="minha-posicao-icone"><i class="bi bi-person-fill"></i></div>
                <div>
                    <span>Sua posição</span>
                    <strong>12º lugar</strong>
                    <small>1.240 pontos</small>
                </div>
                <i class="bi bi-arrow-up-right"></i>
            </aside>
        </div>
    </section>

    <main class="ranking-conteudo">
        <section class="podio-secao" aria-labelledby="titulo-podio">
            <div class="secao-cabecalho">
                <div>
                    <span class="secao-sobretitulo">Destaques do mês</span>
                    <h2 id="titulo-podio">Maiores doadores</h2>
                </div>
                <img src="../asset/img/trophy.png" alt="" aria-hidden="true">
            </div>

            <div class="podio">
                <article class="podio-card segundo-lugar">
                    <span class="podio-posicao">2</span>
                    <img class="podio-avatar" src="../asset/img/User.png" alt="Foto de Carlos Lima">
                    <h3>Carlos Lima</h3>
                    <p>28 doações</p>
                    <strong>4.870 pts</strong>
                </article>
                <article class="podio-card primeiro-lugar">
                    <span class="podio-coroa"><i class="bi bi-trophy-fill"></i></span>
                    <span class="podio-posicao">1</span>
                    <img class="podio-avatar" src="../asset/img/User.png" alt="Foto de Ana Souza">
                    <h3>Ana Souza</h3>
                    <p>34 doações</p>
                    <strong>5.620 pts</strong>
                </article>
                <article class="podio-card terceiro-lugar">
                    <span class="podio-posicao">3</span>
                    <img class="podio-avatar" src="../asset/img/User.png" alt="Foto de Marina Alves">
                    <h3>Marina Alves</h3>
                    <p>25 doações</p>
                    <strong>4.390 pts</strong>
                </article>
            </div>
        </section>

        <section class="classificacao-secao" aria-labelledby="titulo-classificacao">
            <div class="classificacao-topo">
                <div>
                    <span class="secao-sobretitulo">Classificação geral</span>
                    <h2 id="titulo-classificacao">Doadores da comunidade</h2>
                </div>
                <div class="ranking-filtros">
                    <label class="ranking-busca">
                        <span class="visually-hidden">Buscar doador</span>
                        <i class="bi bi-search"></i>
                        <input id="busca-ranking" type="search" placeholder="Buscar doador">
                    </label>
                    <label>
                        <span class="visually-hidden">Selecionar período</span>
                        <select id="periodo-ranking" aria-label="Selecionar período">
                            <option value="mes">Este mês</option>
                            <option value="semana">Esta semana</option>
                            <option value="geral">Todo o período</option>
                        </select>
                    </label>
                </div>
            </div>

            <div class="ranking-tabela" role="table" aria-label="Classificação dos doadores">
                <div class="ranking-tabela-cabecalho" role="row">
                    <span role="columnheader">Posição</span>
                    <span role="columnheader">Doador(a)</span>
                    <span role="columnheader">Doações</span>
                    <span role="columnheader">Impacto</span>
                    <span role="columnheader">Pontuação</span>
                </div>
                <div id="ranking-lista" class="ranking-lista"></div>
            </div>
            <p id="ranking-contagem" class="ranking-contagem" aria-live="polite"></p>
        </section>
    </main>

    <?php require 'templates/footer.php'; ?>

    <script src="js/infoFooter.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/ranking.js"></script>
</body>

</html>