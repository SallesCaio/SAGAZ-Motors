<?php
// pages/contato.php
$pageTitle = 'Contato — SAGAZ MOTORS';
$activePage = 'contato';
require_once '../includes/db.php';
require_once '../includes/functions.php';

$mensagem = '';
$tipo = '';

// Processa formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $modeloId = $_POST['modelo_id'] ?? null;
    $msg = trim($_POST['mensagem'] ?? '');

    if ($nome && $telefone) {
        try {
            $stmt = $pdo->prepare("INSERT INTO leads (nome, telefone, email, modelo_id, mensagem) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$nome, $telefone, $email, $modeloId, $msg]);
            $mensagem = 'Mensagem enviada com sucesso! Entraremos em contato em breve.';
            $tipo = 'success';
        } catch (PDOException $e) {
            $mensagem = 'Erro ao enviar mensagem. Tente novamente.';
            $tipo = 'danger';
        }
    } else {
        $mensagem = 'Preencha pelo menos nome e telefone.';
        $tipo = 'warning';
    }
}

$modelos = getModelos($pdo);

include '../includes/header.php';
?>

<section id="contato" class="py-5">
    <div class="container">
        <h1 class="catalog-title text-center mb-2">Entre em <span class="text-danger">Contato</span></h1>
        <p class="text-white-50 text-center mb-5">Fale conosco e encontre a moto elétrica ideal</p>

        <?php if ($mensagem): ?>
        <div class="alert alert-<?= $tipo ?> alert-dismissible fade show" role="alert">
            <?= $mensagem ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <div class="row g-4">
            <!-- Formulário -->
            <div class="col-lg-6">
                <div class="card bg-dark border-secondary">
                    <div class="card-body p-4">
                        <h4 class="text-white mb-4"><i class="fa-solid fa-envelope text-danger"></i> Envie sua Mensagem</h4>

                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="nome" class="form-label text-white-50">Nome *</label>
                                <input type="text" class="form-control bg-dark text-white border-secondary" id="nome" name="nome" required>
                            </div>

                            <div class="mb-3">
                                <label for="telefone" class="form-label text-white-50">Telefone/WhatsApp *</label>
                                <input type="tel" class="form-control bg-dark text-white border-secondary" id="telefone" name="telefone" placeholder="(21) 99999-9999" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label text-white-50">E-mail</label>
                                <input type="email" class="form-control bg-dark text-white border-secondary" id="email" name="email">
                            </div>

                            <div class="mb-3">
                                <label for="modelo_id" class="form-label text-white-50">Modelo de Interesse</label>
                                <select class="form-select bg-dark text-white border-secondary" id="modelo_id" name="modelo_id">
                                    <option value="">Selecione um modelo</option>
                                    <?php foreach ($modelos as $m): ?>
                                    <option value="<?= $m['id'] ?>"><?= $m['nome'] ?> — <?= formatarParcela($m['preco'], $m['parcelas']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="mensagem" class="form-label text-white-50">Mensagem</label>
                                <textarea class="form-control bg-dark text-white border-secondary" id="mensagem" name="mensagem" rows="4" placeholder="Conte-nos mais sobre o que você procura..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fa-solid fa-paper-plane"></i> Enviar Mensagem
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Informações de Contato -->
            <div class="col-lg-6">
                <div class="card bg-dark border-secondary mb-4">
                    <div class="card-body p-4">
                        <h4 class="text-white mb-4"><i class="fa-solid fa-location-dot text-danger"></i> Onde Estamos</h4>

                        <ul class="list-unstyled text-white-50">
                            <li class="mb-3">
                                <i class="fa-solid fa-map-marker-alt text-danger me-2"></i>
                                Rua Araponga, Galeão — Rio de Janeiro/RJ
                            </li>
                            <li class="mb-3">
                                <i class="fa-solid fa-phone text-danger me-2"></i>
                                (21) 99999-9999
                            </li>
                            <li class="mb-3">
                                <i class="fa-solid fa-envelope text-danger me-2"></i>
                                contato@sagazmotors.com.br
                            </li>
                            <li class="mb-3">
                                <i class="fa-solid fa-clock text-danger me-2"></i>
                                Seg a Sáb: 9h às 18h
                            </li>
                        </ul>

                        <a href="https://wa.me/5521999052694?text=Olá! Gostaria de saber mais sobre as motos elétricas SAGAZ."
                           class="btn btn-success w-100" target="_blank">
                            <i class="fa-brands fa-whatsapp"></i> Falar pelo WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Garantias -->
                <div class="card bg-dark border-secondary">
                    <div class="card-body p-4">
                        <h4 class="text-white mb-4"><i class="fa-solid fa-shield-halved text-danger"></i> Nossas Garantias</h4>

                        <div class="d-flex align-items-start mb-3">
                            <i class="fa-solid fa-check-circle text-success me-3 mt-1"></i>
                            <div>
                                <strong class="text-white">Qualidade Garantida</strong>
                                <p class="text-white-50 mb-0">Produtos de alta qualidade e garantia para você.</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-3">
                            <i class="fa-solid fa-check-circle text-success me-3 mt-1"></i>
                            <div>
                                <strong class="text-white">Assistência Especializada</strong>
                                <p class="text-white-50 mb-0">Suporte completo e peças de reposição.</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start">
                            <i class="fa-solid fa-check-circle text-success me-3 mt-1"></i>
                            <div>
                                <strong class="text-white">Melhor Custo-Benefício</strong>
                                <p class="text-white-50 mb-0">Desempenho, economia e durabilidade.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
