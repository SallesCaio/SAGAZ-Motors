<?php
// pages/modelos.php
// Pagina de detalhe do modelo SAGAZ MOTORS - v2.0
// Melhorias: galeria de imagens, especificacoes completas, simulador

require_once '../includes/db.php';
require_once '../includes/functions.php';

$slug = $_GET['slug'] ?? null;

if (!$slug) {
    header('Location: catalogo.php');
    exit;
}

$modelo = getModelo($pdo, $slug);

if (!$modelo) {
    header('Location: catalogo.php');
    exit;
}

// Buscar modelos relacionados (mesma categoria)
$relacionados = getModelos($pdo, $modelo['categoria_slug']);
$relacionados = array_filter($relacionados, function($m) use ($slug) {
    return $m['slug'] !== $slug;
});
$relacionados = array_slice($relacionados, 0, 4);

$pageTitle = $modelo['nome'] . ' — SAGAZ MOTORS';
$activePage = 'catalogo';

include '../includes/header.php';
?>

<section id="modelo" class="py-5">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php" class="text-white-50">Início</a></li>
                <li class="breadcrumb-item"><a href="catalogo.php" class="text-white-50">Catálogo</a></li>
                <li class="breadcrumb-item active text-danger" aria-current="page"><?= $modelo['nome'] ?></li>
            </ol>
        </nav>

        <div class="row">
            <!-- Galeria de Imagens -->
            <div class="col-lg-6 mb-4">
                <div class="card bg-dark border-secondary">
                    <img src="../<?= $modelo['imagem'] ?>" 
                         class="card-img-top" 
                         alt="SAGAZ <?= $modelo['nome'] ?>" 
                         style="max-height: 400px; object-fit: contain; background: #1a1a1a;"
                         id="imagemPrincipal"
                         onerror="this.src='../img/hero-moto.svg'">
                </div>
                <!-- Thumbnails (se houver multiplas imagens) -->
                <div class="row g-2 mt-2">
                    <div class="col-3">
                        <img src="../<?= $modelo['imagem'] ?>" 
                             class="img-thumbnail bg-dark border-secondary" 
                             style="height: 80px; object-fit: cover; cursor: pointer;"
                             onclick="trocarImagem('../<?= $modelo['imagem'] ?>')"
                             onerror="this.src='../img/hero-moto.svg'">
                    </div>
                </div>
            </div>

            <!-- Informacoes -->
            <div class="col-lg-6">
                <span class="badge bg-secondary mb-2"><?= $modelo['categoria_nome'] ?></span>
                <h1 class="text-white display-4 fw-bold"><?= $modelo['nome'] ?></h1>

                <!-- Preco -->
                <div class="my-4">
                    <span class="text-white-50">POR APENAS</span>
                    <div class="display-3 fw-bold">
                        <span class="text-danger"><?= $modelo['parcelas'] ?>x</span>
                        <span class="text-white"> R$<?= number_format($modelo['parcela_valor'], 0, ',', '.') ?></span>
                    </div>
                    <small class="text-white-50">ou <?= formatarPreco($modelo['preco']) ?> à vista</small>
                </div>

                <!-- Especificacoes -->
                <div class="card bg-dark border-secondary mb-4">
                    <div class="card-body">
                        <h5 class="text-white mb-3"><i class="fa-solid fa-gauge-high text-danger"></i> Especificações Técnicas</h5>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="spec-item">
                                    <i class="fa-solid fa-bolt text-danger"></i>
                                    <span class="text-white-50">Motor</span>
                                    <strong class="text-white d-block"><?= $modelo['motor'] ?></strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="spec-item">
                                    <i class="fa-solid fa-battery-full text-danger"></i>
                                    <span class="text-white-50">Bateria</span>
                                    <strong class="text-white d-block"><?= $modelo['bateria'] ?></strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="spec-item">
                                    <i class="fa-solid fa-road text-danger"></i>
                                    <span class="text-white-50">Autonomia</span>
                                    <strong class="text-white d-block"><?= $modelo['autonomia'] ?></strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="spec-item">
                                    <i class="fa-solid fa-gauge text-danger"></i>
                                    <span class="text-white-50">Velocidade</span>
                                    <strong class="text-white d-block"><?= $modelo['velocidade_max'] ?></strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="spec-item">
                                    <i class="fa-solid fa-clock text-danger"></i>
                                    <span class="text-white-50">Carga</span>
                                    <strong class="text-white d-block"><?= $modelo['tempo_carga'] ?></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp -->
                <a href="https://wa.me/5521999052694?text=Olá! Tenho interesse no modelo <?= $modelo['nome'] ?> (<?= formatarParcela($modelo['preco'], $modelo['parcelas']) ?>)"
                   class="btn btn-success btn-lg w-100 mb-3" target="_blank">
                    <i class="fa-brands fa-whatsapp"></i> Falar com um Vendedor
                </a>

                <!-- Diferenciais -->
                <div class="row g-2 mt-3">
                    <div class="col-6">
                        <div class="d-flex align-items-center text-white-50">
                            <i class="fa-solid fa-leaf text-success me-2"></i>
                            <small>Sustentável</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center text-white-50">
                            <i class="fa-solid fa-piggy-bank text-warning me-2"></i>
                            <small>Econômica</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center text-white-50">
                            <i class="fa-solid fa-volume-xmark text-info me-2"></i>
                            <small>Silenciosa</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center text-white-50">
                            <i class="fa-solid fa-wrench text-danger me-2"></i>
                            <small>Baixa Manutenção</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Simulador de Parcelamento -->
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <div class="card bg-dark border-secondary">
                    <div class="card-body">
                        <h4 class="text-white mb-4"><i class="fa-solid fa-calculator text-danger"></i> Simulador de Parcelamento</h4>
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <label class="text-white-50">Número de parcelas: <span id="parcelasLabel" class="text-danger fw-bold">18x</span></label>
                                <input type="range" class="form-range" id="parcelasRange" min="1" max="24" value="18" oninput="calcularParcelamento()">
                                <div class="d-flex justify-content-between text-white-50">
                                    <span>1x</span>
                                    <span>24x</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <span class="text-white-50">Valor da parcela</span>
                                <div class="display-4 fw-bold text-danger" id="valorParcela">
                                    R$ <?= number_format(calcularParcela($modelo['preco'], 18), 2, ',', '.') ?>
                                </div>
                                <small class="text-white-50" id="valorTotal">Total: <?= formatarPreco($modelo['preco']) ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modelos Relacionados -->
        <?php if (!empty($relacionados)): ?>
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="text-white mb-4">Você também pode gostar</h3>
            </div>
            <?php foreach ($relacionados as $rel): ?>
            <div class="col-md-3">
                <div class="card model-card h-100">
                    <div class="card-img-wrapper">
                        <img src="../<?= $rel['imagem'] ?>" class="card-img-top" alt="SAGAZ <?= $rel['nome'] ?>" loading="lazy" onerror="this.src='../img/hero-moto.svg'">
                        <div class="card-overlay">
                            <a href="modelos.php?slug=<?= $rel['slug'] ?>" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-eye"></i> Ver
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title"><?= $rel['nome'] ?></h6>
                        <span class="text-danger fw-bold"><?= formatarParcela($rel['preco'], $rel['parcelas']) ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
function trocarImagem(src) {
    document.getElementById('imagemPrincipal').src = src;
}

function calcularParcelamento() {
    const parcelas = parseInt(document.getElementById('parcelasRange').value);
    const valorTotal = <?= $modelo['preco'] ?>;
    const valorParcela = valorTotal / parcelas;

    document.getElementById('parcelasLabel').textContent = parcelas + 'x';
    document.getElementById('valorParcela').textContent =
        parcelas + 'x R$ ' + valorParcela.toFixed(2).replace('.', ',');
    document.getElementById('valorTotal').textContent =
        'Total: R$ ' + valorTotal.toFixed(2).replace('.', ',');
}
</script>

<?php include '../includes/footer.php'; ?>
