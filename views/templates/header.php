<header>
    <div class="logo">
        <a href="index.php"><img src="../img/ReciclaTech 1.png" alt="logo"></a>
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
                    <a href="logout.php" class="saida">Sair
                        <svg width="15px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 12L13 12" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M18 15L20.913 12.087V12.087C20.961 12.039 20.961 11.961 20.913 11.913V11.913L18 9" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M16 5V4.5V4.5C16 3.67157 15.3284 3 14.5 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21H14.5C15.3284 21 16 20.3284 16 19.5V19.5V19" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
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