<?php
// includes/header.php
if (!isset($pageTitle)) $pageTitle = 'SAGAZ MOTORS';
if (!isset($activePage)) $activePage = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?> — SAGAZ MOTORS</title>
    <meta name="description" content="SAGAZ MOTORS — Motos elétricas com o melhor custo-benefício. Economia, sustentabilidade e performance.">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/logo.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="img/logo.png">
        <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
     <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/index.php">
                    <img src="/img/logo.png" alt="SAGAZ MOTORS" height="50">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link <?= $activePage === 'home' ? 'active' : '' ?>" href="/index.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $activePage === 'catalogo' ? 'active' : '' ?>" href="/pages/catalogo.php">Catálogo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $activePage === 'contato' ? 'active' : '' ?>" href="/pages/contato.php">Contato</a>
                        </li>
                    </ul>
                    <a href="https://wa.me/5521999052694" class="btn btn-success ms-3" target="_blank">
                        <i class="fa-brands fa-whatsapp"></i> Fale Conosco
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main style="padding-top: 80px;">