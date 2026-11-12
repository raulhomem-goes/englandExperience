<?php
session_start();
include_once('./config/database.php');
include_once('./includes/data/data.php');
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/output.css">
    <title>Configurar</title>
</head>
<body class="min-h-screen bg-black text-white">
    <main class="relative min-h-screen w-full flex flex-col items-center justify-center overflow-hidden py-16">
        <img src="./src/img/emfrentepraia.jpg" class="fixed inset-0 w-full h-full object-cover" alt="">
        <div class="fixed inset-0 bg-black/75 backdrop-blur-sm"></div>
        <a href="./index.php" class="absolute top-6 left-6 z-20 font-impact text-2xl text-white hover:text-rose-600 transition-colors">
            INGLATERRA
        </a>
        <div class="relative z-10 w-full max-w-7xl px-5">
            <div class="mb-12 text-center">
                <h1 class="font-impact text-6xl md:text-8xl text-white mb-3">CONFIGURAÇÕES</h1>
                <p class="text-gray-300 text-sm md:text-base tracking-wide">Gerencie as imagens e o conteúdo do seu site.</p>
                <div class="w-20 h-1 bg-rose-600 mx-auto mt-5"></div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <section class="bg-black/60 backdrop-blur-md border border-white/20 p-6 md:p-10 rounded-sm">
                    <div class="flex items-center justify-between mb-8 border-b border-white/20 pb-5">
                        <div>
                            <h2 class="font-impact text-3xl md:text-4xl text-white">IMAGENS DO BANCO</h2>
                            <p class="text-gray-400 text-sm mt-2">Imagens disponíveis para publicação.</p>
                        </div>
                        <span class="text-rose-500 font-impact text-3xl">01</span>
                    </div>
                    <?php if (!empty($pontosTuristicos)) {
                        foreach ($pontosTuristicos as $pontoTuristico) { ?>
                            <div class="flex flex-col sm:flex-row items-center gap-5 border-b border-white/10 py-6 last:border-0">
                                <img src="./src/uploads/<?= htmlspecialchars($pontoTuristico['nome'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($pontoTuristico['nome'], ENT_QUOTES, 'UTF-8') ?>" class="w-full sm:w-2/5 h-48 object-cover rounded-sm">
                                <div class="flex flex-wrap justify-center sm:justify-start gap-3">
                                    <form action="./src/uploads/delete.php" method="post">
                                        <button type="submit" name="delete" value="<?= htmlspecialchars((string) $pontoTuristico['id'], ENT_QUOTES, 'UTF-8') ?>" class="group relative flex items-center justify-center overflow-hidden bg-rose-600 px-5 py-3 text-sm font-bold uppercase tracking-wider text-white transition-all duration-300 hover:bg-rose-700 hover:-translate-y-1">
                                            <span class="relative z-10">Deletar</span>
                                        </button>
                                    </form>
                                    <form action="./src/uploads/tobanner.php" method="post">
                                        <button type="submit" name="adicionar" value="<?= htmlspecialchars((string) $pontoTuristico['id'], ENT_QUOTES, 'UTF-8') ?>" class="group relative flex items-center justify-center overflow-hidden border border-white/40 bg-white/10 px-5 py-3 text-sm font-bold uppercase tracking-wider text-white transition-all duration-300 hover:bg-white hover:text-black hover:-translate-y-1">
                                            <span class="relative z-10">Adicionar</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <p class="text-gray-400 text-center py-10">Nenhuma imagem no banco de dados.</p>
                    <?php } ?>
                </section>
                <section class="bg-black/60 backdrop-blur-md border border-white/20 p-6 md:p-10 rounded-sm h-fit">
                    <div class="flex items-center justify-between mb-8 border-b border-white/20 pb-5">
                        <div>
                            <h2 class="font-impact text-3xl md:text-4xl text-white">IMAGENS DO BANNER</h2>
                            <p class="text-gray-400 text-sm mt-2">Imagens atualmente em destaque.</p>
                        </div>
                        <span class="text-rose-500 font-impact text-3xl">02</span>
                    </div>
                    <?php if (!empty($imagemPrincipal)) {
                        foreach ($imagemPrincipal as $principal) { ?>
                            <div class="flex flex-col sm:flex-row items-center gap-5 border-b border-white/10 py-6 last:border-0">
                                <img src="./src/uploads/<?= htmlspecialchars($principal['nome'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($principal['nome'], ENT_QUOTES, 'UTF-8') ?>" class="w-full sm:w-2/5 h-48 object-cover rounded-sm">
                                <div class="flex flex-wrap justify-center sm:justify-start gap-3">
                                    <form action="./src/uploads/deletefrombanner.php" method="post">
                                        <button type="submit" name="delete" value="<?= htmlspecialchars((string) $principal['id'], ENT_QUOTES, 'UTF-8') ?>" class="group relative flex items-center justify-center overflow-hidden bg-rose-600 px-5 py-3 text-sm font-bold uppercase tracking-wider text-white transition-all duration-300 hover:bg-rose-700 hover:-translate-y-1">
                                            <span class="relative z-10">Tirar do banner</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <p class="text-gray-400 text-center py-10">Nenhuma imagem no banner.</p>
                    <?php } ?>
                </section>
            </div>
            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-10">
                <a href="dashboard.php" class="group flex items-center justify-center bg-rose-600 px-8 py-4 text-sm font-bold uppercase tracking-wider text-white transition-all duration-300 hover:bg-rose-700 hover:-translate-y-1">
                    Publicar imagem
                </a>
                <a href="index.php" class="group flex items-center justify-center border border-white/40 bg-white/10 px-8 py-4 text-sm font-bold uppercase tracking-wider text-white transition-all duration-300 hover:bg-white hover:text-black hover:-translate-y-1">
                    Voltar ao início
                </a>
            </div>
        </div>
    </main>
</body>
</html>
