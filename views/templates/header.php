<header>
    <div class="logo">
        <a href="#"><img src="../img/ReciclaTech 1.png" alt="logo"></a>
        <h1>ReciclaTech</h1>
    </div>
    <div class="menu-direita">
        <nav>
            <a class="cor-destaque-texto" href="index.php">Home</a>
            <a href="ranking.php">Ranking</a>
            <a href="#footer">Contato</a>
        </nav>

        <?php if (isset($_SESSION['user_id'])): // Usuário logado 
        ?>
            <div class="perfil-menu">
                <img onclick="mostrarDropdown()" class="profile-icon" src="../img/profile.png" alt="Foto de perfil do usuario">
                <div class="dropdown">
                    <p class="pontuacao">Pontuação</p>
                    <a href="perfil.php">Perfil</a>
                    <a href="logout.php" class="saida">Sair<img src="../img/iconeSaida.svg" alt="Icone de saida"></a>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!isset($_SESSION['user_id'])): // Usuário não logado 
        ?>
            <div class="botoes">
                <a href="register.php" class="cadastro borda-gradiente botao-transicao">Cadastrar</a>
                <a href="login.php" class="login gradiente-login borda-gradiente botao-transicao">Login</a>
            </div>
        <?php endif; ?>

    </div>
</header>