-- sql/update_imagens.sql
-- Atualizar imagens dos modelos SAGAZ MOTORS
-- Data: 2026-06-18

USE sagaz_motors;

UPDATE modelos SET imagem = 'img/models/m400.png' WHERE slug = 'm400';
UPDATE modelos SET imagem = 'img/models/cargueira.png' WHERE slug = 'cargueira';
UPDATE modelos SET imagem = 'img/models/oek-tech.png' WHERE slug = 'oek-tech';
UPDATE modelos SET imagem = 'img/models/tank.png' WHERE slug = 'tank';
UPDATE modelos SET imagem = 'img/models/ag8.png' WHERE slug = 'ag-8';
UPDATE modelos SET imagem = 'img/models/ag10.png' WHERE slug = 'ag-10';
UPDATE modelos SET imagem = 'img/models/ag12.png' WHERE slug = 'ag-12';
UPDATE modelos SET imagem = 'img/models/ag15.png' WHERE slug = 'ag-15';
UPDATE modelos SET imagem = 'img/models/n70.png' WHERE slug = 'n70';
UPDATE modelos SET imagem = 'img/models/paris-retro.png' WHERE slug = 'paris-retro';
UPDATE modelos SET imagem = 'img/models/dolphin-gs.png' WHERE slug = 'dolphin-gs';
UPDATE modelos SET imagem = 'img/models/x13.png' WHERE slug = 'harley-x13';
UPDATE modelos SET imagem = 'img/models/v8.png' WHERE slug = 'v8';
UPDATE modelos SET imagem = 'img/models/triciclo.png' WHERE slug = 'triciclo';
UPDATE modelos SET imagem = 'img/models/p400.png' WHERE slug = 'p400';
UPDATE modelos SET imagem = 'img/models/bike-yoyo.png' WHERE slug = 'bike-yoyo';
