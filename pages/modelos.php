<?php
// pages/modelos.php
// Página de detalhe do modelo SAGAZ MOTORS

require_once '../includes/db.php';
require_once '../includes/functions.php';

$slug = $_GET['slug'] ?? null;

if (!$slug) {
    header('Location: /pages/catalogo.php');
    exit;
}

$modelo = getModelo($pdo, $slug);

if (!$modelo) {
    header('Location: /pages/catalogo.php');
    exit;
}

// Buscar modelos relacionados (mesma categoria)
$relacionados = getModelos($pdo, $modelo['categoria_slug']);
$relacionados = array_filter($relacionados, function($m) use ($slug) {
    return $m['slug'] !== $slug;
});
$relacionados = array_slice($relacionados, 0, 3);

$pageTitle = $modelo['nome'] . ' — SAGAZ MOTORS';
$activePage = 'catalogo';

include '../includes/header.php';
?>

<section id="modelo" class="py-5">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/index.php" style="color: #a0a0a0;">Início</a></li>
                <li class="breadcrumb-item"><a href="/pages/catalogo.php" style="color: #a0a0a0;">Catálogo</a></li>
                <li class="breadcrumb-item active text-danger" aria-current="page"><?= $modelo['nome'] ?></li>
            </ol>
        </nav>

        <div class="row g-5">
            <!-- Imagem do Produto -->
            <div class="col-lg-6">
                <div class="product-image-wrapper">
                    <img src="/<?= $modelo['imagem'] ?>" 
                         class="product-main-image" 
                         alt="SAGAZ <?= $modelo['nome'] ?>"
                         onerror="this.src='/img/hero-moto.svg'">
                </div>
            </div>

            <!-- Informações do Produto -->
            <div class="col-lg-6">
                <span class="badge bg-secondary mb-2"><?= $modelo['categoria_nome'] ?></span>
                <h1 class="product-title"><?= $modelo['nome'] ?></h1>
                <p class="product-subtitle">Scooter Elétrica</p>

                <!-- Preço -->
                <div class="product-price-box">
                    <span class="price-label">POR APENAS</span>
                    <div class="price-main">
                        <span class="price-installments"><?= $modelo['parcelas'] ?>x</span>
                        <span class="price-value">R$<?= number_format($modelo['parcela_valor'], 0, ',', '.') ?></span>
                    </div>
                    <small class="price-cash">ou <?= formatarPreco($modelo['preco']) ?> à vista</small>
                </div>

                <!-- Especificações -->
                <div class="specs-card">
                    <h5 class="text-white mb-4">
                        <i class="fa-solid fa-gauge-high text-danger"></i> Especificações Técnicas
                    </h5>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="spec-item">
                                <i class="fa-solid fa-bolt text-danger"></i>
                                <span class="spec-label">Motor</span>
                                <strong class="spec-value d-block"><?= $modelo['motor'] ?></strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="spec-item">
                                <i class="fa-solid fa-battery-full text-danger"></i>
                                <span class="spec-label">Bateria</span>
                                <strong class="spec-value d-block"><?= $modelo['bateria'] ?></strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="spec-item">
                                <i class="fa-solid fa-road text-danger"></i>
                                <span class="spec-label">Autonomia</span>
                                <strong class="spec-value d-block"><?= $modelo['autonomia'] ?></strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="spec-item">
                                <i class="fa-solid fa-gauge text-danger"></i>
                                <span class="spec-label">Velocidade</span>
                                <strong class="spec-value d-block"><?= $modelo['velocidade_max'] ?></strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="spec-item">
                                <i class="fa-solid fa-clock text-danger"></i>
                                <span class="spec-label">Carga</span>
                                <strong class="spec-value d-block"><?= $modelo['tempo_carga'] ?></strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp CTA -->
                <a href="https://wa.me/5521999052694?text=Olá! Tenho interesse no modelo <?= $modelo['nome'] ?> (<?= formatarParcela($modelo['preco'], $modelo['parcelas']) ?>)"
                   class="btn btn-success btn-lg w-100 mb-3" target="_blank">
                    <i class="fa-brands fa-whatsapp"></i> Falar com um Vendedor
                </a>

                <!-- Diferenciais -->
                <div class="row g-2 mt-2">
                    <div class="col-6 d-flex align-items-center">
                        <i class="fa-solid fa-leaf text-success me-2"></i>
                        <small class="text-white-50">Sustentável</small>
                    </div>
                    <div class="col-6 d-flex align-items-center">
                        <i class="fa-solid fa-piggy-bank text-warning me-2"></i>
                        <small class="text-white-50">Econômica</small>
                    </div>
                    <div class="col-6 d-flex align-items-center">
                        <i class="fa-solid fa-volume-xmark text-info me-2"></i>
                        <small class="text-white-50">Silenciosa</small>
                    </div>
                    <div class="col-6 d-flex align-items-center">
                        <i class="fa-solid fa-wrench text-danger me-2"></i>
                        <small class="text-white-50">Baixa Manutenção</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Simulador de Parcelamento -->
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <div class="simulator-card">
                    <h4 class="text-white mb-4"><i class="fa-solid fa-calculator text-danger"></i> Simulador de Parcelamento</h4>
                    <div class="row align-items-center g-4">
                        <div class="col-md-6">
                            <label class="text-white-50 d-block mb-2">Número de parcelas: <span id="parcelasLabel" class="text-danger fw-bold">18x</span></label>
                            <input type="range" class="form-range" id="parcelasRange" min="1" max="24" value="18" oninput="calcularParcelamento()">
                            <div class="d-flex justify-content-between text-white-50">
                                <span>1x</span>
                                <span>24x</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <span class="text-white-50 d-block mb-1">Valor da parcela</span>
                            <div class="display-4 fw-bold text-danger" id="valorParcela">
                                R$ <?= number_format(calcularParcela($modelo['preco'], 18), 2, ',', '.') ?>
                            </div>
                            <small class="text-white-50" id="valorTotal">Total: <?= formatarPreco($modelo['preco']) ?></small>
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
            <div class="col-md-4">
                <div class="card model-card h-100">
                    <div class="card-img-wrapper">
                        <img src="/<?= $rel['imagem'] ?>" class="card-img-top" alt="SAGAZ <?= $rel['nome'] ?>" loading="lazy" onerror="this.src='/img/hero-moto.svg'">
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
