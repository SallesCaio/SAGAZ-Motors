-- Atualizar TODOS os caminhos de imagens
USE sagaz_motors;

UPDATE modelos SET imagem = 'img/models/m400-prod.png' WHERE slug = 'm400';
UPDATE modelos SET imagem = 'img/models/cargueira.png' WHERE slug = 'cargueira';
UPDATE modelos SET imagem = 'img/models/tank.png' WHERE slug = 'tank';
UPDATE modelos SET imagem = 'img/models/n70.png' WHERE slug = 'n70';
UPDATE modelos SET imagem = 'img/models/x13.png' WHERE slug = 'harley-x13';
UPDATE modelos SET imagem = 'img/models/paris-retro.png' WHERE slug = 'paris-retro';
UPDATE modelos SET imagem = 'img/models/oek-tech.svg' WHERE slug = 'oek-tech';
UPDATE modelos SET imagem = 'img/models/ag-8.svg' WHERE slug = 'ag-8';
UPDATE modelos SET imagem = 'img/models/ag-10.svg' WHERE slug = 'ag-10';
UPDATE modelos SET imagem = 'img/models/ag-12.svg' WHERE slug = 'ag-12';
UPDATE modelos SET imagem = 'img/models/ag-15.svg' WHERE slug = 'ag-15';
UPDATE modelos SET imagem = 'img/models/dolphin-gs.svg' WHERE slug = 'dolphin-gs';
UPDATE modelos SET imagem = 'img/models/v8.svg' WHERE slug = 'v8';
UPDATE modelos SET imagem = 'img/models/triciclo.svg' WHERE slug = 'triciclo';
UPDATE modelos SET imagem = 'img/models/p400.svg' WHERE slug = 'p400';
UPDATE modelos SET imagem = 'img/models/bike-yoyo.svg' WHERE slug = 'bike-yoyo';

-- Verificar todos
SELECT id, nome, slug, imagem FROM modelos ORDER BY id;
