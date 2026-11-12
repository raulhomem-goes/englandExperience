<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/output.css">
    <title>Dashboard</title>
</head>

<body class="min-h-screen bg-black text-white">
    <main class="relative min-h-screen w-full flex items-center justify-center overflow-hidden py-10">
        <img src="./src/img/emfrentepraia.jpg" class="fixed inset-0 w-full h-full object-cover" alt="">
        <div class="fixed inset-0 bg-black/75 backdrop-blur-sm"></div>
        <a href="./index.php" class="absolute top-6 left-6 z-20 font-impact text-2xl text-white hover:text-rose-600 transition-colors">
            INGLATERRA
        </a>
        <div class="relative z-10 w-full max-w-xl mx-5 bg-black/60 backdrop-blur-md border border-white/20 p-8 md:p-12">
            <div class="mb-10 text-center">
                <h1 class="font-impact text-6xl md:text-7xl text-white mb-3">DASHBOARD</h1>
                <p class="text-gray-300 text-sm md:text-base">Publique novas imagens para o seu site.</p>
                <div class="w-16 h-1 bg-rose-600 mx-auto mt-5"></div>
            </div>
            <form action="./src/uploads/upload.php" method="post" enctype="multipart/form-data" class="flex flex-col gap-6">
                <div>
                    <label for="fileToUpload" class="block text-sm font-medium text-white mb-3">Selecione uma imagem para fazer upload:</label>
                    <input type="file" name="fileToUpload" id="fileToUpload" class="block w-full text-sm text-gray-300 border border-white/30 bg-white/10 cursor-pointer focus:outline-none file:mr-4 file:border-0 file:bg-rose-600 file:px-5 file:py-3 file:text-sm file:font-bold file:uppercase file:tracking-wider file:text-white hover:file:bg-rose-700 transition-colors" required>
                </div>
                <button type="submit" class="group relative flex items-center justify-center overflow-hidden bg-rose-600 px-6 py-4 text-sm font-bold uppercase tracking-wider text-white transition-all duration-300 hover:-translate-y-1 hover:bg-rose-700">
                    <span class="relative z-10 transition-transform duration-300 group-hover:scale-105">Postar imagem</span>
                    <span class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/20 to-transparent transition-transform duration-700 group-hover:translate-x-full"></span>
                </button>
                <a href="files.php" class="group flex items-center justify-center border border-white/40 bg-white/10 px-6 py-4 text-sm font-bold uppercase tracking-wider text-white transition-all duration-300 hover:-translate-y-1 hover:bg-white hover:text-black">
                    Ver imagens
                </a>
                <a href="index.php" class="text-center text-sm text-gray-400 hover:text-white transition-colors mt-2">
                    Voltar ao início
                </a>
            </form>
        </div>
    </main>
</body>

</html>