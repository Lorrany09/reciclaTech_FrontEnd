<?php 
require 'config.php'; 

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// session_start();
// if (!isset($_SESSION['register_data'])) {
//     header("Location: registerpt1.php");
//     exit;
// }

$msg = '';
if (isset($_GET['error'])) {
    $msg = '<div class="alert alert-danger">Erro ao cadastrar endereço. Tente novamente.</div>';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ReciclaTech - Endereço</title>
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
            width: 100%;
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
            width: 100%;
        }
        .grupo-campo label {
            color: #212529;
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .grupo-campo input {
            width: 100%;
            border: none;
            border-bottom: 1px solid rgba(0,0,0,.2);
            outline: none;
            background: transparent;
        }
        .grupo-campo input::placeholder {
            color: rgba(0,0,0,.2);
        }
        .row-campos {
            display: flex;
            gap: 20px;
            width: 100%;
        }
        .row-campos .grupo-campo {
            flex: 1;
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
        .setinha{
            position: relative;
            right: 145px;
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
                <a href="registerpt1.php"><img src="img/setaEsquerda.png" alt="setinha" class="setinha"></a>
                <img src="img/ReciclaTech.png" alt="Logo" class="logo">
                <span>ReciclaTech</span>
            </div>

            <h2>Informe seu endereço</h2>

            <?= $msg ?>

            <form action="register_step2_action.php" method="POST">
                <div class="row-campos">
                    <div class="grupo-campo">
                        <label>Rua/Avenida</label>
                        <input type="text" name="address_street" placeholder="Insira sua rua" required>
                    </div>
                    <div class="grupo-campo">
                        <label>Número</label>
                        <input type="text" name="address_number" placeholder="Número" required>
                    </div>
                </div>

                <div class="row-campos">
                    <div class="grupo-campo">
                        <label>Complemento (Opcional)</label>
                        <input type="text" name="address_complement" placeholder="Apto, Bloco, etc">
                    </div>
                    <div class="grupo-campo">
                        <label>CEP</label>
                        <input type="text" name="address_zipcode" placeholder="00000-000" required>
                    </div>
                </div>

                <div class="row-campos">
                    <div class="grupo-campo">
                        <label>Cidade</label>
                        <input type="text" name="address_city" placeholder="Sua cidade" required>
                    </div>
                    <div class="grupo-campo">
                        <label>Estado</label>
                        <input type="text" name="address_state" placeholder="UF" required>
                    </div>
                </div>

                <button type="submit" class="botao-register">
                    Cadastrar
                </button>
            </form>
        </div>
    </main>
</body>
</html>