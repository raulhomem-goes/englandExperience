<?php
session_start();
require_once('../../config/database.php');

// Pasta onde as imagens serão salvas (use a MESMA pasta no script de remoção)
$target_dir = __DIR__ . '/';

$erros = [];

// Verifica se um arquivo foi enviado sem erro
if (!isset($_FILES["fileToUpload"]) || $_FILES["fileToUpload"]["error"] !== UPLOAD_ERR_OK) {
    $erros[] = "Nenhum arquivo válido foi enviado.";
} else {
    $originalName  = basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

    // Verifica se é realmente uma imagem
    if (getimagesize($_FILES["fileToUpload"]["tmp_name"]) === false) {
        $erros[] = "O arquivo não é uma imagem.";
    }

    // Tamanho máximo: 5 MB
    if ($_FILES["fileToUpload"]["size"] > 5 * 1024 * 1024) {
        $erros[] = "Desculpe, aceitamos imagens com no máximo 5 MB.";
    }

    // Formatos permitidos
    $permitidos = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $permitidos, true)) {
        $erros[] = "Desculpe, aceitamos apenas imagens nos formatos PNG, JPEG, JPG ou GIF.";
    }
}

// Se não houve erros, tenta salvar
if (empty($erros)) {
    // Nome único: evita conflito com arquivos antigos ou de outros usuários
    $newName     = uniqid('img_', true) . '.' . $imageFileType;
    $target_file = $target_dir . $newName;

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $sql = $conexao->prepare("INSERT INTO imagensenviadas (nome) VALUES (:nome_arquivo)");
        $sql->bindParam(':nome_arquivo', $newName); // salva o nome novo no banco
        $sql->execute();

        // Redireciona antes de qualquer saída HTML
        header("Location: ../../files.php");
        exit;
    } else {
        $erros[] = "Ocorreu um erro inesperado e sua imagem não foi enviada.";
    }
}
?>
<link rel="stylesheet" href="../output.css">
<?php foreach ($erros as $erro): ?>
    <p class="font-semibold"><?= htmlspecialchars($erro) ?></p><br />
<?php endforeach; ?>
<a href="../../files.php" class="font-semibold underline">Voltar</a>