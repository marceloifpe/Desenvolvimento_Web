<?php
// Proteção de página: Se o cookie não existir, joga de volta para o login
if (!isset($_COOKIE['usuario_nome'])) {
    header("Location: login.php");
    exit;
}

$nomeUsuario = $_COOKIE['usuario_nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Home - Portal Estelar do Ted</title>
    <style>
        /* Padrão de cor de fundo #62C3FC e fonte limpa e moderna combinando */
        body {
            background-color: #62C3FC;
            font-family: 'Century Gothic', sans-serif;
            color: #ffffff;
            text-align: center;
            margin: 0;
            padding: 50px 20px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }
        .welcome-msg {
            font-size: 1.5rem;
            margin-bottom: 50px;
            background: rgba(30, 61, 89, 0.2);
            padding: 15px;
            border-radius: 8px;
            display: inline-block;
        }
        .user-footer {
            font-size: 1.8rem;
            font-weight: bold;
            margin-top: 40px;
            color: #1e3d59;
            text-shadow: none;
        }
        .img-noel {
            width: 250px;
            border-radius: 15px;
            margin-top: 20px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            display: block;
            margin: 20px auto 0 auto; /* Centraliza a imagem embaixo */
        }
        .logout-btn {
            display: inline-block;
            margin-top: 20px;
            color: #1e3d59;
            text-decoration: none;
            font-weight: bold;
            background: white;
            padding: 8px 16px;
            border-radius: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Bem-Vindo ao portal Estelar do Ted</h1>

    <div class="welcome-msg">
        🚀 Você se conectou com sucesso à nossa galáxia de desenvolvimento!
    </div>

    <div class="user-footer">
        Astronave comandada por: <span style="color: white;"><?php echo htmlspecialchars($nomeUsuario); ?></span>
    </div>

    <img src="imagens/ted-noel.jpeg" alt="Ted Noel" class="img-noel">

    <br>
    <a href="login.php" class="logout-btn">Sair do Portal</a>
</div>

</body>
</html>