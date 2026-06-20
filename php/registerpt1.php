<?php 
require 'config.php'; 

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$msg = '';
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'email_exists') {
        $msg = '<div class="alert alert-danger">Erro: Este e-mail já está cadastrado.</div>';
    } else {
        $msg = '<div class="alert alert-danger">Erro ao cadastrar. Tente novamente.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ReciclaTech - Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background: #dfe5e0; 
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 20px;
        }
        main{
            width: 1000px;
            max-width: 95%;
            background: #EDF5EE;
            border-radius: 25px;
            padding: 18px;
            display: flex;
            gap: 50px;
            box-shadow: 0 10px 25px rgba(0,0,0,.2);
        }
        form{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .formulario-register {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
        }
        .logo-pequena {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-bottom: 25px;
        }
        .logo-pequena img {
            width: 35px;
            height: 35px;
        }
        .logo-pequena span {
            font-size: 15px;
            font-weight: 700;
            position: relative;
            right: 20px;
        }
        .formulario-register h2 {
            color: #212529;
            text-align: center;
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 40px;
        }
        .grupo-campo {
            margin-bottom: 25px;
        }
        .grupo-campo label {
            color: #212529;
            display: block;
            font-size: 14px;
        }
        .grupo-campo input {
            width: 350px;
            border: none;
            border-bottom: 1px solid rgba(0,0,0,.2);
            outline: none;
            background: transparent;
        }
        .grupo-campo input::placeholder {
            color: rgba(0,0,0,.2);
        }
        .botao-register {
            width: 300px;
            border: none;
            border-radius: 30px;
            padding: 12px;
            color: #dfe5e0;
            font-weight: bold;
            background: linear-gradient(to right, #11873F, #3BDF51);
            margin-top: 15px;
            transition: .3s;
            font-size: 16px;
            cursor: pointer;
        }
        .botao-register:hover {
            transform: translateY(-2px);
        }
        .link-login {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        .link-login a {
            color: #026939;
            font-weight: bold;
            text-decoration: none;
        }
        .imagem-register {
            flex: 1;
        }
        .imagem-register img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 18px;
        }
        .alert {
            border-radius: 10px;
            padding: 12px 15px;
            margin-bottom: 20px;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .campo-senha {
            position: relative;
            display: flex;
            align-items: center;
        }

        .campo-senha input {
            flex: 1;
            padding-right: 45px;
        }

        .btn-olho {
            position: absolute;
            right: 330px;
            top: 480px;
            background: transparent;
            border: none;
            cursor: pointer;
        }
        .btn-olho img{
            width: 25px;
            height: 25px
        }
        .setinha{
            position: relative;
            right: 90px;
            cursor: pointer;
        }
        .logo{
            position: relative;
            right: 20px;
        }
    </style>
</head>
<body>
    <main>
        <div class="imagem-register">
            <img src="img/image-left.png" alt="ReciclaTech">
        </div>

        <div class="formulario-register">
            <div class="logo-pequena">
                <img src="img/setaEsquerda.png" alt="setinha" class="setinha">
                <img src="img/ReciclaTech.png" alt="Logo" class="logo">
                <span>ReciclaTech</span>
            </div>

            <h2>Insira os dados abaixo</h2>

            <?= $msg ?>

            <form action="" method="POST">
                <div class="grupo-campo">
                    <label>Nome completo</label>
                    <input type="text" name="name" placeholder="Insira seu nome completo" required>
                </div>

                <div class="grupo-campo">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="exemplo@gmail.com" required>
                </div>

                <div class="grupo-campo">
                    <label>Senha</label>
                    <input id="senha" type="password" name="password" placeholder="Insira sua senha" required>
                    <button type="button" class="btn-olho" onclick="clicado(this)">
                        <img id="olhoImg" src="img/olhinho.png" alt="Mostrar senha">
                    </button>
                </div>

                <button type="submit" class="botao-register" onclick="registerpt2.php">
                    Avançar →
                </button>
            </form>
        </div>
    </main>
    <script>
        function clicado(botao) {
            const senha = document.getElementById("senha");
            const olhoImg = botao.querySelector('img');
            
            if (senha.type === 'password') {
                senha.type = 'text';
                olhoImg.src = 'img/olhinhoFechado.png';
            } else {
                senha.type = 'password';
                olhoImg.src = 'img/olhinho.png';
            }
        }
    </script>                                                   
</body>
</html>