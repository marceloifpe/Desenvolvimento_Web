<?php
require_once 'config.php';

$mensagem = "";

// Verificando requisição via GET
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['email']) && isset($_GET['senha'])) {
    $email = $_GET['email'] ?? '';
    $senha = $_GET['senha'] ?? '';

    if (!empty($email) && !empty($senha)) {
        // Busca o usuário no MySQL
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica a senha obedecendo à segurança hash padrão
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Renova ou valida os cookies ativos
            setcookie("usuario_nome", $usuario['nome'], time() + 3600, "/");

            // Redireciona para a Home Estelar
            header("Location: index.php");
            exit;
        } else {
            $mensagem = "<p style='color: red;'>E-mail ou senha incorretos!</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Portal do Ted</title>
    <style>
        body { background-color: #62C3FC; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #1e3d59; text-align: center; margin-top: 40px; }
        .box-login { background: white; padding: 30px; border-radius: 12px; width: 350px; margin: 0 auto; box-shadow: 0px 4px 10px rgba(0,0,0,0.1); }
        .avatar-ted { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; display: block; margin: 0 auto 10px auto; border: 4px solid white; }
        h1 { font-size: 1.8rem; margin: 0 0 20px 0; color: #1e3d59; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; }
        button { background-color: #1e3d59; color: white; border: none; padding: 12px; width: 100%; border-radius: 6px; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>

<img src="imagens/ted-sentado.jpeg" alt="Ted Sentado" class="avatar-ted">
<h1>Portal do Ted</h1>

<div class="box-login">
    <?php echo $mensagem; ?>
    <form action="login.php" method="GET">
        <input type="email" name="email" placeholder="Digite seu E-mail" required>
        <input type="password" name="senha" placeholder="Digite sua Senha" required>
        <button type="submit">Acessar Portal</button>
    </form>
    <p><a href="cadastro.php" style="color: #1e3d59;">Não tem cadastro? Crie aqui</a></p>
</div>

</body>
</html>