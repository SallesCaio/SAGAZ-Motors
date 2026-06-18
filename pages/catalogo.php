<?php
// pages/catalogo.php
// Catalogo de motos eletricas SAGAZ MOTORS - v2.0
// Melhorias: galeria com imagens reais, filtros por faixa de preco, ordenacao

$pageTitle = 'Catálogo de Motos Elétricas';
$activePage = 'catalogo';
require_once '../includes/db.php';
require_once '../includes/functions.php';

// Filtros
$categoria = $_GET['cat'] ?? null;
$ordenar = $_GET['ord'] ?? 'destaque';
$preco_min = $_GET['preco_min'] ?? null;
$preco_max = $_GET['preco_max'] ?? null;

// Buscar modelos com filtros
$modelos = getModelosFiltrados($pdo, $categoria, $ordenar, $preco_min, $preco_max);
$categorias = getCategorias($pdo);

include '../includes/header.php';
?>

<section id="catalogo" class="py-5">
    <div class="container">
        <h1 class="catalog-title text-center mb-2">Nosso <span class="text-danger">Catálogo</span></h1>
        <p class="text-white-50 text-center mb-5">Encontre a moto elétrica ideal para você</p>

        <!-- Filtros -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card bg-dark border-secondary p-3">
                    <form method="GET" class="row g-3 align-items-end">
                        <!-- Categoria -->
                        <div class="col-md-3">
                            <label class="text-white-50 small">Categoria</label>
                            <select name="cat" class="form-select form-select-sm bg-dark text-white border-secondary">
                                <option value="">Todas</option>
                                <?php foreach ($categorias as $cat): ?>
                                <option value="<?= $cat['slug'] ?>" <?= $categoria === $cat['slug'] ? 'selected' : '' ?>>
                                    <?= $cat['nome'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Faixa de Preco -->
                        <div class="col-md-3">
                            <label class="text-white-50 small">Preço mínimo</label>
                            <select name="preco_min" class="form-select form-select-sm bg-dark text-white border-secondary">
                                <option value="">Qualquer</option>
                                <option value="2000" <?= $preco_min == '2000' ? 'selected' : '' ?>>R$ 2.000+</option>
                                <option value="5000" <?= $preco_min == '5000' ? 'selected' : '' ?>>R$ 5.000+</option>
                                <option value="8000" <?= $preco_min == '8000' ? 'selected' : '' ?>>R$ 8.000+</option>
                                <option value="10000" <?= $preco_min == '10000' ? 'selected' : '' ?>>R$ 10.000+</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="text-white-50 small">Preço máximo</label>
                            <select name="preco_max" class="form-select form-select-sm bg-dark text-white border-secondary">
                                <option value="">Qualquer</option>
                                <option value="5000" <?= $preco_max == '5000' ? 'selected' : '' ?>>Até R$ 5.000</option>
                                <option value="8000" <?= $preco_max == '8000' ? 'selected' : '' ?>>Até R$ 8.000</option>
                                <option value="12000" <?= $preco_max == '12000' ? 'selected' : '' ?>>Até R$ 12.000</option>
                            </select>
                        </div>

                        <!-- Ordenar -->
                        <div class="col-md-2">
                            <label class="text-white-50 small">Ordenar</label>
                            <select name="ord" class="form-select form-select-sm bg-dark text-white border-secondary">
                                <option value="destaque" <?= $ordenar === 'destaque' ? 'selected' : '' ?>>Destaques</option>
                                <option value="preco_asc" <?= $ordenar === 'preco_asc' ? 'selected' : '' ?>>Menor preço</option>
                                <option value="preco_desc" <?= $ordenar === 'preco_desc' ? 'selected' : '' ?>>Maior preço</option>
                                <option value="nome" <?= $ordenar === 'nome' ? 'selected' : '' ?>>A-Z</option>
                            </select>
                        </div>

                        <!-- Botao -->
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-danger btn-sm w-100">
                                <i class="fa-solid fa-filter"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Resultados -->
        <div class="row g-4">
            <?php if (empty($modelos)): ?>
            <div class="col-12 text-center py-5">
                <i class="fa-solid fa-motorcycle fa-3x text-white-50 mb-3"></i>
                <p class="text-white-50">Nenhum modelo encontrado com esses filtros.</p>
                <a href="catalogo.php" class="btn btn-outline-danger btn-sm">Limpar filtros</a>
            </div>
            <?php endif; ?>

            <?php foreach ($modelos as $modelo): ?>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card model-card h-100">
                    <div class="card-img-wrapper">
                        <img src="../<?= $modelo['imagem'] ?>" 
                             class="card-img-top" 
                             alt="SAGAZ <?= $modelo['nome'] ?>"
                             loading="lazy"
                             onerror="this.src='../img/hero-moto.svg'">
                        <?php if ($modelo['destaque']): ?>
                        <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                            <i class="fa-solid fa-star"></i> Destaque
                        </span>
                        <?php endif; ?>
                        <div class="card-overlay">
                            <a href="modelos.php?slug=<?= $modelo['slug'] ?>" class="btn btn-danger">
                                <i class="fa-solid fa-eye"></i> Ver Detalhes
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2"><?= $modelo['categoria_nome'] ?></span>
                        <h5 class="card-title"><?= $modelo['nome'] ?></h5>
                        <div class="specs mb-2">
                            <small class="text-muted d-block">
                                <i class="fa-solid fa-bolt text-danger"></i> <?= $modelo['motor'] ?>
                            </small>
                            <small class="text-muted d-block">
                                <i class="fa-solid fa-battery-full text-danger"></i> <?= $modelo['bateria'] ?>
                            </small>
                            <small class="text-muted d-block">
                                <i class="fa-solid fa-road text-danger"></i> <?= $modelo['autonomia'] ?>
                            </small>
                        </div>
                        <div class="price">
                            <span class="text-danger fw-bold fs-5"><?= formatarParcela($modelo['preco'], $modelo['parcelas']) ?></span>
                            <small class="text-muted d-block"><?= formatarPreco($modelo['preco']) ?></small>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="https://wa.me/5521999052694?text=Olá! Tenho interesse no modelo <?= $modelo['nome'] ?>"
                           class="btn btn-success w-100" target="_blank">
                            <i class="fa-brands fa-whatsapp"></i> Tenho Interesse
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Contador -->
        <div class="text-center mt-4">
            <small class="text-white-50">
                Exibindo <?= count($modelos) ?> modelo(s)
            </small>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
