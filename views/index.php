<?php
if (!isset($pdo)) require_once __DIR__ . '/config.php';
$homeStats = $pdo->query("SELECT
    (SELECT COUNT(*) FROM devices) AS devices_total,
    (SELECT COUNT(*) FROM devices WHERE status = 'donated') AS reused_total,
    (SELECT COUNT(DISTINCT user_id) FROM devices WHERE user_id IS NOT NULL) AS donors_total")->fetch();
$latestDevices = $pdo->query("SELECT d.id, d.device_type, d.brand, d.model, d.description, d.photo, u.address_city, u.address_state
    FROM devices d LEFT JOIN users u ON u.id = d.user_id
    WHERE d.status = 'available' ORDER BY d.created_at DESC LIMIT 8")->fetchAll();
$homeRanking = $pdo->query("SELECT u.name, u.points, COUNT(d.id) AS donations_total
    FROM users u LEFT JOIN devices d ON d.user_id = u.id WHERE u.role = 'user'
    GROUP BY u.id ORDER BY u.points DESC, donations_total DESC LIMIT 4")->fetchAll();
?>
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
</head>

<style>
    .mapa-container {
        width: 100%;
        height: 680px;
        border-radius: 18px;
        overflow: hidden;
        background: #eef6f0;
    }

    #map {
        width: 100%;
        height: 100%;
    }

    .voltar-topo {
        position: fixed;
        right: clamp(16px, 3vw, 32px);
        bottom: clamp(16px, 3vw, 32px);
        z-index: 1800;
        display: grid;
        width: 48px;
        height: 48px;
        place-items: center;
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.28);
        border-radius: 50%;
        background: var(--darkEmerald);
        box-shadow: 0 12px 28px rgba(0, 35, 16, 0.28);
        cursor: pointer;
        opacity: 0;
        pointer-events: none;
        transform: translateY(14px);
        transition: opacity 0.2s ease, transform 0.2s ease, background-color 0.2s ease;
    }

    .voltar-topo i {
        font-size: 21px;
    }

    .voltar-topo:hover {
        background: var(--jadeGreen);
        transform: translateY(-2px);
    }

    .voltar-topo.visivel {
        opacity: 1;
        pointer-events: auto;
        transform: translateY(0);
    }

    @media (max-width: 480px) {
        .voltar-topo {
            width: 44px;
            height: 44px;
        }
    }
</style>

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
                        <a href="" class="quero-receber borda-gradiente botao-transicao">Quero Receber</a>
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
                        <h2><?= (int) $homeStats['reused_total'] ?> dispositivos reaproveitados</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="item-estatistica">
                    <div class="icone">
                        <img src="../img/iconeSmartphone.svg" alt="Desenho de um smartphone">
                    </div>
                    <div class="conteudo">
                        <h2>><?= (int) $homeStats['devices_total'] ?> dispositivos doado</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="item-estatistica">
                    <div class="icone">
                        <img src="../img/iconeUsers.svg" alt="Desenho representando os usuarios">
                    </div>
                    <div class="conteudo">
                        <h2><?= (int) $homeStats['donors_total'] ?> doadores ativos</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </section>
            <section class="pt-5">
                <div class="titulo-doacoes">
                    <h1 class="fw-bold">Doações da semana</h1>
                    <a href="" class="fw-bold">Ver todas ➝</a>
                </div>
                <div class="fundo-cards">
                    <button id="btn-voltar" class="carrossel-seta">←</button>
                    <div class="carrossel-container">
                        <div class="carrossel-track" id="trilho-doacoes">
                            <?php foreach ($latestDevices as $device):
                                $deviceName = trim($device['device_type'] . ' ' . $device['brand'] . ' ' . $device['model']);
                                $location = trim(($device['address_city'] ?: 'Local não informado') . ($device['address_state'] ? ' - ' . $device['address_state'] : ''));
                            ?>
                                <div class="card">
                                    <div class="imagem-card-container"><img class="imagem-doacao" src="<?= e($device['photo'] ?: '../img/equipamentosQuebrados.webp') ?>" alt="Foto de <?= e($deviceName) ?>"></div>
                                    <div class="descricao-doacao">
                                        <p class="fw-bold nome-dispositivo"><?= e($deviceName) ?></p>
                                        <p class="descricao text-muted"><?= e($device['description'] ?: 'Sem descrição.') ?></p>
                                    </div>
                                    <div class="rodape-card">
                                        <p><?= e($location) ?></p><a href="adote.php" class="botao-card gradiente-bts-principais botao-transicao">Eu quero</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
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
                <a href="ranking.php" class="verRaking"><span>Ver Ranking</span></a>
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
            <div class="ranking">
                <?php foreach ($homeRanking as $position => $donor): ?>
                    <div class="teste"><span class="colocacao"><?= $position + 1 ?></span>
                        <div class="user"><img src="../img/User.png" alt=""><span><?= e($donor['name']) ?></span></div><span><?= (int) $donor['donations_total'] ?></span><span class="pontos"><?= (int) $donor['points'] ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
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
                <div class="mapa-container">
                    <div id="map"></div>
                </div>
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
    </footer>
    <button class="voltar-topo" id="voltar-topo" type="button" title="Voltar ao topo" aria-label="Voltar ao topo">
        <i class="bi bi-arrow-up"></i>
    </button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/conteudoCards.js"></script>
    <script src="../js/infoFooter.js"></script>
    <script src="../js/dropdown.js"></script>
    <script src="../js/carrossel-sobre.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        const trilho = document.getElementById('trilho-doacoes');
        const cardsDoacao = trilho?.querySelectorAll('.card') || [];
        let posicaoAtual = 0;

        function atualizarCarrossel() {
            if (!cardsDoacao.length) return;
            trilho.style.transform = `translateX(-${(cardsDoacao[0].offsetWidth + 20) * posicaoAtual}px)`;
        }
        document.getElementById('btn-avancar')?.addEventListener('click', () => {
            if (posicaoAtual < Math.max(0, cardsDoacao.length - 3)) {
                posicaoAtual++;
                atualizarCarrossel();
            }
        });
        document.getElementById('btn-voltar')?.addEventListener('click', () => {
            if (posicaoAtual > 0) {
                posicaoAtual--;
                atualizarCarrossel();
            }
        });
    </script>

</body>

<script>
    // Coordenadas de Iguatu - CE
    const latitude = -6.361428075382552;
    const longitude = -39.29868647321685;

    const map = L.map('map').setView([latitude, longitude], 14);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    // Marcador da localização principal
    L.marker([latitude, longitude])
        .addTo(map)
        .bindPopup('Sua localização')
        .openPopup();

    // Exemplo de ecoponto
    L.marker([-6.3650, -39.3005])
        .addTo(map)
        .bindPopup('Ecoponto');

    // Exemplo de instituição/ONG
    L.marker([-6.3550, -39.2920])
        .addTo(map)
        .bindPopup('Instituição Social / ONG');


    const botaoVoltarTopo = document.getElementById("voltar-topo");

    function atualizarBotaoVoltarTopo() {
        if (!botaoVoltarTopo) return;
        botaoVoltarTopo.classList.toggle("visivel", window.scrollY > 500);
    }

    botaoVoltarTopo?.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });

    window.addEventListener("scroll", atualizarBotaoVoltarTopo, {
        passive: true
    });
    atualizarBotaoVoltarTopo();
</script>

</html>