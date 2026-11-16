<?php
session_start();
require_once('../../config/database.php');

// IMPORTANTE: deve ser EXATAMENTE a mesma pasta onde o upload salva as imagens.
// Se este arquivo estiver em outra pasta que o upload, ajuste o caminho,
// por exemplo: __DIR__ . '/../upload/'
$pasta = __DIR__ . DIRECTORY_SEPARATOR;

// Token CSRF simples
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

/* ---------- EXCLUSÃO (POST) ---------- */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')) {
        exit('Requisição inválida.');
    }

    $id = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);
    if (!$id) {
        exit('ID inválido.');
    }

    $stmt = $conexao->prepare("SELECT nome FROM imagensenviadas WHERE id = ?");
    $stmt->execute([$id]);
    $arquivo = $stmt->fetchColumn();

    if ($arquivo) {
        $caminho = $pasta . basename($arquivo);

        // Apaga o arquivo físico (se existir) e registra falha, se houver
        if (is_file($caminho) && !unlink($caminho)) {
            error_log("Falha ao apagar o arquivo: " . $caminho);
            exit('Não foi possível apagar o arquivo. Verifique as permissões da pasta.');
        }

        // Só remove do banco depois de apagar o arquivo
        $stmt = $conexao->prepare("DELETE FROM imagensenviadas WHERE id = ?");
        $stmt->execute([$id]);
    }

    header('Location: ../../files.php');
    exit;
}

/* ---------- CONFIRMAÇÃO (GET) ---------- */
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    exit('ID inválido.');
}

$stmt = $conexao->prepare("SELECT id, nome FROM imagensenviadas WHERE id = ?");
$stmt->execute([$id]);
$imagem = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$imagem) {
    exit('Imagem não encontrada.');
}
?>
<link rel="stylesheet" href="../output.css">

<form method="POST" class="p-4">
    <p class="font-semibold mb-4">
        Deseja realmente remover a imagem <?= htmlspecialchars($imagem['nome']) ?>?
    </p>

    <input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf']) ?>">
    <input type="hidden" name="delete" value="<?= (int) $imagem['id'] ?>">

    <button type="submit" class="font-semibold underline">Remover</button>
    <a href="../../files.php" class="font-semibold underline ml-4">Cancelar</a>
</form>