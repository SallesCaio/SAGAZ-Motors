-- sql/sagaz_motors.sql
-- Script completo do banco de dados SAGAZ MOTORS

CREATE DATABASE IF NOT EXISTS sagaz_motors CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sagaz_motors;

-- Tabela de categorias
CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    slug VARCHAR(50) NOT NULL UNIQUE,
    icone VARCHAR(50),
    ordem INT DEFAULT 0
);

INSERT INTO categorias (nome, slug, icone, ordem) VALUES
('Scooters', 'scooters', 'fa-motorcycle', 1),
('Cargueiras', 'cargueiras', 'fa-truck', 2),
('Bikes Elétricas', 'bikes', 'fa-bicycle', 3),
('Triciclos', 'triciclos', 'fa-wheelchair', 4);

-- Tabela de modelos
CREATE TABLE IF NOT EXISTS modelos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria_id INT,
    nome VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    preco DECIMAL(10,2) NOT NULL,
    parcela_valor DECIMAL(10,2) NOT NULL,
    parcelas INT DEFAULT 18,
    motor VARCHAR(50),
    bateria VARCHAR(50),
    autonomia VARCHAR(20),
    velocidade_max VARCHAR(20),
    tempo_carga VARCHAR(20),
    descricao TEXT,
    imagem VARCHAR(255),
    destaque TINYINT(1) DEFAULT 0,
    ativo TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);

-- Tabela de leads
CREATE TABLE IF NOT EXISTS leads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    telefone VARCHAR(20),
    email VARCHAR(100),
    modelo_id INT,
    mensagem TEXT,
    status ENUM('novo', 'contatado', 'convertido') DEFAULT 'novo',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (modelo_id) REFERENCES modelos(id)
);

-- Inserir modelos
INSERT INTO modelos (categoria_id, nome, slug, preco, parcela_valor, parcelas, motor, bateria, autonomia, velocidade_max, tempo_carga, destaque) VALUES
(1, 'M400', 'm400', 5022.00, 279.00, 18, '400W', '36V 10AH', '40 km', '32 km/h', '6-8h', 1),
(2, 'Cargueira', 'cargueira', 9900.00, 550.00, 18, '1000W', '60V 20AH', '50 km', '32 km/h', '5-6h', 1),
(1, 'OEK Tech', 'oek-tech', 7182.00, 399.00, 18, '500W', '48V 20AH', '45 km', '32 km/h', '5-6h', 0),
(1, 'TANK', 'tank', 13662.00, 759.00, 18, '1000W', '60V 20AH', '50 km', '32 km/h', '5-6h', 1),
(1, 'AG 8', 'ag-8', 10422.00, 579.00, 18, '1000W', '60V 20AH', '50 km', '32 km/h', '5-6h', 0),
(1, 'AG 10', 'ag-10', 13662.00, 759.00, 18, '1000W', '60V 20AH', '50 km', '32 km/h', '5-6h', 0),
(1, 'AG 12', 'ag-12', 12942.00, 719.00, 18, '1000W', '60V 20AH', '50 km', '32 km/h', '5-6h', 1),
(1, 'AG 15', 'ag-15', 13662.00, 759.00, 18, '1000W', '60V 20AH', '50 km', '32 km/h', '5-6h', 0),
(1, 'N70', 'n70', 10782.00, 599.00, 18, '1000W', '72V 23AH', '60 km', '32 km/h', '6-8h', 0),
(1, 'Paris Retro', 'paris-retro', 10782.00, 599.00, 18, '1000W', '72V 23AH', '60 km', '32 km/h', '6-8h', 0),
(1, 'Dolphin GS', 'dolphin-gs', 10782.00, 599.00, 18, '1000W', '60V 20AH', '50 km', '32 km/h', '6-8h', 0),
(1, 'Harley X13', 'harley-x13', 10062.00, 559.00, 18, '1000W', '60V 20AH', '50 km', '32 km/h', '5-6h', 0),
(1, 'V8', 'v8', 8442.00, 469.00, 18, '1000W', '60V 20AH', '50 km', '32 km/h', '5-6h', 0),
(4, 'Triciclo', 'triciclo', 12222.00, 679.00, 18, '1000W', '60V 20AH', '50 km', '32 km/h', '5-6h', 0),
(1, 'P400', 'p400', 2322.00, 129.00, 18, '400W', '36V 10AH', '30 km', '25 km/h', '4-6h', 1),
(3, 'Bike Yoyo', 'bike-yoyo', 4302.00, 239.00, 18, '350W', '48V 12AH', '30 km', '32 km/h', '4-8h', 0);
