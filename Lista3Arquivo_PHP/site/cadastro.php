<?php
require_once 'config.php';

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Validação padrão de segurança da senha (Mínimo 8 caracteres, 1 Letra Maiúscula, 1 Número)
    if (strlen($senha) < 8 || !preg_match("/[A-Z]/", $senha) || !preg_match("/[0-9]/", $senha)) {
        $mensagem = "<p style='color: red;'>A senha deve ter pelo menos 8 caracteres, incluindo uma letra maiúscula e um número.</p>";
    } elseif (!empty($nome) && !empty($email) && !empty($senha)) {

        // Criptografia segura da senha (Hash)
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        try {
            // Insere no banco MySQL
            $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
            $stmt->execute([$nome, $email, $senhaHash]);

            // Define cookies com tempo de expiração de 1 hora (3600 segundos)
            $tempoDestruicao = time() + 3600;
            setcookie("usuario_nome", $nome, $tempoDestruicao, "/");
            setcookie("usuario_email", $email, $tempoDestruicao, "/");

            // Grava as informações do tempo de destruição do cadastro em um arquivo .txt
            $linhaTxt = "Usuario: $nome | Email: $email | Cookie expira em: " . date("Y-m-d H:i:s", $tempoDestruicao) . PHP_EOL;
            file_put_contents("../arquivo/expiracao_cookies.txt", $linhaTxt, FILE_APPEND);

            $mensagem = "<p style='color: green;'>Cadastro realizado com sucesso! <a href='login.php'>Ir para o Login</a></p>";
        } catch (PDOException $e) {
            $mensagem = "<p style='color: red;'>Erro ao cadastrar. Talvez o e-mail já esteja em uso.</p>";
        }
    } else {
        $mensagem = "<p style='color: red;'>Por favor, preencha todos os campos.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Portal do Ted</title>
    <style>
        body { background-color: #62C3FC; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #1e3d59; display: block; text-align: center; margin: 50px auto; }
        .box-cadastro { background: white; padding: 30px; border-radius: 12px; width: 350px; margin: 0 auto; box-shadow: 0px 4px 10px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; }
        button { background-color: #1e3d59; color: white; border: none; padding: 12px; width: 100%; border-radius: 6px; cursor: pointer; font-weight: bold; }
        button:hover { background-color: #173047; }
    </style>
</head>
<body>

<div class="box-cadastro">
    <h2>Criar Conta</h2>
    <?php echo $mensagem; ?>
    <form action="cadastro.php" method="POST">
        <input type="text" name="nome" placeholder="Nome Completo" required>
        <input type="email" name="email" placeholder="Seu E-mail" required>
        <input type="password" name="senha" placeholder="Senha (8+ char, 1 Maiúscula, 1 Número)" required>
        <button type="submit">Cadastrar</button>
    </form>
    <p><a href="login.php" style="color: #1e3d59;">Já tem conta? Logar</a></p>
</div>

</body>
</html>