<?php
// includes/functions.php
// Funções auxiliares do SAGAZ MOTORS

function formatarPreco($preco) {
    return 'R$ ' . number_format($preco, 2, ',', '.');
}

function formatarParcela($valor, $parcelas) {
    $valorParcela = $valor / $parcelas;
    return $parcelas . 'x R$' . number_format($valorParcela, 2, ',', '.');
}

function getModelos($pdo, $categoria = null, $destaque = null) {
    $sql = "SELECT m.*, c.nome as categoria_nome, c.slug as categoria_slug 
            FROM modelos m 
            JOIN categorias c ON m.categoria_id = c.id 
            WHERE m.ativo = 1";
    $params = [];
    
    if ($categoria) {
        $sql .= " AND c.slug = ?";
        $params[] = $categoria;
    }
    
    if ($destaque) {
        $sql .= " AND m.destaque = 1";
    }
    
    $sql .= " ORDER BY m.destaque DESC, m.preco ASC";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function getModelo($pdo, $slug) {
    $stmt = $pdo->prepare("SELECT m.*, c.nome as categoria_nome, c.slug as categoria_slug 
                           FROM modelos m 
                           JOIN categorias c ON m.categoria_id = c.id 
                           WHERE m.slug = ? AND m.ativo = 1");
    $stmt->execute([$slug]);
    return $stmt->fetch();
}

function getCategorias($pdo) {
    $stmt = $pdo->query("SELECT * FROM categorias ORDER BY ordem");
    return $stmt->fetchAll();
}

function calcularParcela($valor, $parcelas) {
    return $valor / $parcelas;
}

function gerarLinkWhatsApp($telefone, $mensagem) {
    $telefone = preg_replace('/[^0-9]/', '', $telefone);
    $mensagem = urlencode($mensagem);
    return "https://wa.me/55$telefone?text=$mensagem";
}

function getModelosFiltrados($pdo, $categoria = null, $ordenar = 'destaque', $preco_min = null, $preco_max = null) {
    $sql = "SELECT m.*, c.nome as categoria_nome, c.slug as categoria_slug 
            FROM modelos m 
            JOIN categorias c ON m.categoria_id = c.id 
            WHERE m.ativo = 1";
    $params = [];
    
    if ($categoria) {
        $sql .= " AND c.slug = ?";
        $params[] = $categoria;
    }
    
    if ($preco_min) {
        $sql .= " AND m.preco >= ?";
        $params[] = $preco_min;
    }
    
    if ($preco_max) {
        $sql .= " AND m.preco <= ?";
        $params[] = $preco_max;
    }
    
    // Ordenacao
    switch ($ordenar) {
        case 'preco_asc':
            $sql .= " ORDER BY m.preco ASC";
            break;
        case 'preco_desc':
            $sql .= " ORDER BY m.preco DESC";
            break;
        case 'nome':
            $sql .= " ORDER BY m.nome ASC";
            break;
        case 'destaque':
        default:
            $sql .= " ORDER BY m.destaque DESC, m.preco ASC";
            break;
    }
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}
