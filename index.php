<?php
 // index.php

    $pageTitle = 'SAGAZ MOTORS - Motos Elétricas';
    $activePage = 'home';
    require_once 'includes/db.php';
    require_once 'includes/functions.php';

    $destaques = getModelos($pdo, null, true);
    $categorias = getCategorias($pdo);

    include 'includes/header.php';
?>

<section id="hero" class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-6">
                <span class="badge bg-danger mb-3">NOVO</span>
                <h1 class="display-3 fw-bold text-white">
                    M400 <span class="text-danger">SCOOTER ELÉTRICA</span>
                </h1>
                <p class="lead text-white-50 mb-4">
                    Economia, sustentabilidade e performance para o seu dia a dia.
                </p>
                <div class="hero-price mb-4">
                    <span class="text-white-50">POR APENAS</span>
                    <div class="display-4 fw-bold">
                        <span class="text-danger">18x</span> <span class="text-white">R$279</span>
                    </div>
                </div>
                <div class="d-flex gap-3">
                    <a href="pages/catalogo.php" class="btn btn-danger btn-lg">
                        <i class="fa-solid fa-motorcycle"></i> Ver Catálogo
                    </a>
                    <a href="pages/modelos.php?slug=m400" class="btn btn-outline-light btn-lg">
                        Ver Detalhes <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="img/hero-moto.svg" alt="SAGAZ M400" class="img-fluid hero-image">
            </div>
        </div>
    </div>
</section>


<section id="destaques" class="py-5 bg-black">
    <div class="container">
        <h2 class="text-center text-white mb-2">Modelos em <span class="text-danger">Destaque</span></h2>
        <p class="text-center text-white-50 mb-5">Conheça nossos melhores modelos</p>

        <div class="row g-4">
            <?php foreach ($destaques as $modelo): ?>
            <div class="col-md-6 col-lg-3">
                <div class="card model-card h-100">
                    <div class="card-img-wrapper">
                        <img src="<?= $modelo['imagem'] ?>" class="card-img-top" alt="SAGAZ <?= $modelo['nome'] ?>" loading="lazy" onerror="this.src='img/hero-moto.svg'">
                        <div class="card-overlay">
                            <a href="pages/modelos.php?slug=<?= $modelo['slug'] ?>" class="btn btn-danger">
                                <i class="fa-solid fa-eye"></i> Ver Detalhes
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2"><?= $modelo['categoria_nome'] ?></span>
                        <h5 class="card-title"><?= $modelo['nome'] ?></h5>
                        <div class="specs mb-2">
                            <small class="text-muted"><i class="fa-solid fa-bolt text-danger"></i> <?= $modelo['motor'] ?></small>
                            <small class="text-muted"><i class="fa-solid fa-road text-danger"></i> <?= $modelo['autonomia'] ?></small>
                        </div>
                        <div class="price">
                            <span class="text-danger fw-bold"><?= formatarParcela($modelo['preco'], $modelo['parcelas']) ?></span>
                            <small class="text-muted d-block"><?= formatarPreco($modelo['preco']) ?></small>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="https://wa.me/5521999999999?text=Olá! Tenho interesse no modelo <?= $modelo['nome'] ?>"
                           class="btn btn-success w-100" target="_blank">
                            <i class="fa-brands fa-whatsapp"></i> Tenho Interesse
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5">
            <a href="pages/catalogo.php" class="btn btn-outline-danger btn-lg">
                Ver Todos os Modelos <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<section id="categorias" class="py-5">
    <div class="container">
        <h2 class="text-center text-white mb-5">Nossas <span class="text-danger">Categorias</span></h2>

        <div class="row g-4 justify-content-center">
            <?php foreach ($categorias as $cat): ?>
            <div class="col-6 col-md-3">
                <a href="pages/catalogo.php?cat=<?= $cat['slug'] ?>" class="text-decoration-none">
                    <div class="card category-card text-center h-100">
                        <div class="card-body">
                            <i class="fa-solid <?= $cat['icone'] ?> fa-3x text-danger mb-3"></i>
                            <h5 class="card-title text-white"><?= $cat['nome'] ?></h5>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="diferenciais" class="py-5 bg-dark">
    <div class="container">
        <h2 class="text-center text-white mb-5">Por que escolher a <span class="text-danger">SAGAZ</span>?</h2>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card feature-card text-center h-100">
                    <div class="card-body">
                        <i class="fa-solid fa-leaf fa-3x text-success mb-3"></i>
                        <h5 class="text-white">Sustentável</h5>
                        <p class="text-white-50">Zero emissão de poluentes. Contribua para um futuro mais limpo.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card feature-card text-center h-100">
                    <div class="card-body">
                        <i class="fa-solid fa-piggy-bank fa-3x text-warning mb-3"></i>
                        <h5 class="text-white">Econômica</h5>
                        <p class="text-white-50">Sem gasto com gasolina. Economia de até 90% no transporte.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card feature-card text-center h-100">
                    <div class="card-body">
                        <i class="fa-solid fa-volume-xmark fa-3x text-info mb-3"></i>
                        <h5 class="text-white">Silenciosa</h5>
                        <p class="text-white-50">Conforto total sem ruído. Ideal para qualquer horário.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card feature-card text-center h-100">
                    <div class="card-body">
                        <i class="fa-solid fa-wrench fa-3x text-danger mb-3"></i>
                        <h5 class="text-white">Baixa Manutenção</h5>
                        <p class="text-white-50">Menos peças móveis, menos custos. Simplicidade que economiza.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="cta-final" class="py-5 bg-danger">
    <div class="container text-center">
        <h2 class="text-white mb-3">Pronto para <span class="fw-bold">mudar sua mobilidade</span>?</h2>
        <p class="text-white-50 mb-4">Fale com nossa equipe e encontre a moto elétrica ideal para você.</p>
        <a href="https://wa.me/5521999052694?text=Olá! Gostaria de saber mais sobre as motos elétricas SAGAZ."
           class="btn btn-light btn-lg" target="_blank">
            <i class="fa-brands fa-whatsapp text-success"></i> Fale Conosco pelo WhatsApp
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>