<?php
session_start();
require_once("../config/database.php");
$erro = '';
$sucesso = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'] ?? '';
    $confirmarSenha = $_POST['confirmarSenha'] ?? '';
    if ($nome === '' || $email === false || $email === null || $senha === '' || $confirmarSenha === '') {
        $erro = 'Preencha todos os campos corretamente.';
    } elseif ($senha !== $confirmarSenha) {
        $erro = 'As senhas não coincidem.';
    } else {
        $checkEmail = $conexao->prepare(
            "SELECT id FROM usuarios WHERE email = :email"
        );
        $checkEmail->execute(['email' => $email]);
        if ($checkEmail->fetch()) {
            $erro = 'Esse email já foi registrado.';
        } else {
            try {
                $stmt = $conexao->prepare(
                    "INSERT INTO usuarios (nome, email, senha)
                    VALUES (:nome, :email, :senha)"
                );
                $stmt->execute([
                    'nome' => $nome,
                    'email' => $email,
                    'senha' => password_hash($senha, PASSWORD_DEFAULT),
                ]);
                $sucesso = 'Cadastro realizado com sucesso.';
            } catch (PDOException $e) {
                $erro = 'Um erro inesperado ocorreu.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../src/output.css" rel="stylesheet">
    <title>Cadastro</title>
</head>

<body class="min-h-screen bg-black text-white">
    <main class="relative min-h-screen flex items-center justify-center overflow-hidden py-10">
        <img src="./assets/img/inglaterra.jpg" class="absolute inset-0 w-full h-full object-cover" alt="">
        <div class="absolute inset-0 bg-black/65"></div>
        <a href="./index.php" class="absolute top-6 left-6 z-10 font-impact text-2xl text-white hover:text-rose-600 transition-colors">
            INGLATERRA
        </a>
        <div class="relative z-10 w-full max-w-md mx-5 bg-black/50 backdrop-blur-md border border-white/20 p-8 md:p-12">
            <h1 class="font-impact text-6xl md:text-7xl mb-2">CADASTRO</h1>
            <p class="text-gray-300 mb-8">Crie sua conta e comece sua experiência.</p>
            <form action="cadastro.php" method="POST" class="flex flex-col gap-5">
                <div>
                    <label for="nome" class="block text-sm mb-2">Nome completo</label>
                    <input type="text" id="nome" name="nome" placeholder="Seu nome" required class="w-full bg-white/10 border border-white/30 p-3 text-white placeholder-gray-400 outline-none focus:border-rose-600 transition-colors">
                </div>
                <div>
                    <label for="email" class="block text-sm mb-2">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="seuemail@email.com" required class="w-full bg-white/10 border border-white/30 p-3 text-white placeholder-gray-400 outline-none focus:border-rose-600 transition-colors">
                </div>
                <div>
                    <label for="senha" class="block text-sm mb-2">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Crie uma senha" required class="w-full bg-white/10 border border-white/30 p-3 text-white placeholder-gray-400 outline-none focus:border-rose-600 transition-colors">
                </div>
                <div>
                    <label for="confirmarSenha" class="block text-sm mb-2">Confirmar senha</label>
                    <input type="password" id="confirmarSenha" name="confirmarSenha" placeholder="Repita sua senha" required class="w-full bg-white/10 border border-white/30 p-3 text-white placeholder-gray-400 outline-none focus:border-rose-600 transition-colors">
                </div>
                <button type="submit" class="w-full bg-rose-600 py-3 mt-2 font-bold uppercase tracking-wider hover:bg-rose-700 transition-colors">
                    Criar conta
                </button>
                <?php if ($erro !== ''): ?>
                    <p class="text-red-500 text-center w-full text-sm">
                        <?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?>
                    </p>
                <?php endif; ?>
                <?php if ($sucesso !== ''): ?>
                    <p class="text-green-400 text-center w-full text-sm">
                        <?= htmlspecialchars($sucesso, ENT_QUOTES, 'UTF-8') ?>
                        <a href="./login.php" class="text-blue-500 hover:underline">Ir para o login</a>
                    </p>
                <?php endif; ?>
            </form>
            <p class="text-center text-gray-300 text-sm mt-8">
                Já possui uma conta?
                <a href="./login.php" class="text-rose-500 hover:text-white transition-colors">Faça login</a>
            </p>
            <a href="./index.php" class="block text-center text-gray-400 text-sm mt-5 hover:text-white transition-colors">
                Voltar para o início
            </a>
        </div>
    </main>
</body>

</html>