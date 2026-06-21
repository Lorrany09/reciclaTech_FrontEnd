<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de doações</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/carrossel.css">
    <link rel="stylesheet" href="../css/carrossel-sobre.css">
    <link rel="stylesheet" href="../css/funcionamento.css">
    <link rel="stylesheet" href="../css/donation-list.css">
</head>
<body>
    <?php require 'templates/header.php'; ?>
    
    <div id="search-container">
        <h2>Procure por dispositivos</h2>
        
        <form action="" id="searchBar">
            <input type="text" name="searchBarContent" id="searchBarContent" placeholder="O que você quer adotar hoje?">
        </form>
    </div>
    
    <h2>Adote um dispositivo</h2>
    <p>Veja os dispositivos eletrônicos que estão disponíveis para doação e reutilização. Reserve o seu!</p>
    
    <div id="sortButtonsContainer">
        <button class="botao-card gradiente-bts-principais botao-transicao" id="btnNovo">Novo</button>
        <button class="botao-card not-selected" id="btnSemiNovo">Seminovo</button>
        <button class="botao-card not-selected" id="btnDesgastado">Desgastado</button>
        <button class="botao-card not-selected" id="btnQuebrado">Quebrado</button>
    </div>

    <div id="donations-main-container">
        <div class="carrossel-track" id="trilho-doacoes"></div>
    </div>   


    <?php require 'templates/footer.php'; ?>
    <script src="../js/infoFooter.js"></script>
    <script src="../js/conteudoCards.js"></script>
    <script src="../js/carrossel.js"></script>
    <script src="../js/donation-list.js"></script>
</body>
</html>