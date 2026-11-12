<?php
session_start();
include_once('../config/database.php');

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'] ?? '';

    if (!$email || $senha === '') {
        $erro = 'Preencha todos os campos.';
    } else {
        $sql = $conexao->prepare(
            "SELECT id, nome, email, senha FROM usuarios WHERE email = :email"
        );
        $sql->execute(['email' => $email]);
        $usuario = $sql->fetch();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            session_regenerate_id(true);

            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_name'] = $usuario['nome'];

            header('Location: ../index.php');
            exit;
        }

        $erro = 'Nome ou senha inválidos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../src/output.css" rel="stylesheet">
    <title>Login</title>
</head>

<body class="min-h-screen bg-black text-white">
    <main class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <img src="./assets/img/inglaterra.jpg" class="absolute inset-0 w-full h-full object-cover" alt="">
        <div class="absolute inset-0 bg-black/65"></div>
        <form action="login.php" method="POST">
            <a href="./index.php" class="absolute top-6 left-6 z-10 font-impact text-2xl text-white hover:text-rose-600 transition-colors">
                INGLATERRA
            </a>
            <div class="relative z-10 w-full max-w-md mx-5 bg-black/50 backdrop-blur-md border border-white/20 p-8 md:p-12">
                <h1 class="font-impact text-6xl md:text-7xl mb-2">LOGIN</h1>
                <p class="text-gray-300 mb-8">Entre para continuar sua experiência.</p>
                <form action="#" method="POST" class="flex flex-col gap-5">
                    <div>
                        <label for="email" class="block text-sm mb-2">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="seuemail@email.com" required class="w-full bg-white/10 border border-white/30 p-3 text-white placeholder-gray-400 outline-none focus:border-rose-600 transition-colors">
                    </div>
                    <div>
                        <label for="senha" class="block text-sm mb-2">Senha</label>
                        <input type="password" id="senha" name="senha" placeholder="Sua senha" required class="w-full bg-white/10 border border-white/30 p-3 text-white placeholder-gray-400 outline-none focus:border-rose-600 transition-colors">
                    </div>
                    <button type="submit" class="w-full bg-rose-600 py-3 mt-2 font-bold uppercase tracking-wider hover:bg-rose-700 transition-colors">
                        Entrar
                    </button>
                    <?php if (isset($erro)) { ?>
                        <p class="text-red-500 text-center w-full text-2xl"><?= $erro ?></p>
                    <?php } ?>
                </form>
                <p class="text-center text-gray-300 text-sm mt-8">
                    Não possui uma conta?
                    <a href="./cadastro.php" class="text-rose-500 hover:text-white transition-colors">Cadastre-se</a>
                </p>
                <a href="./index.php" class="block text-center text-gray-400 text-sm mt-5 hover:text-white transition-colors">
                    Voltar para o início
                </a>
            </div>
        </form>
    </main>
</body>

</html>