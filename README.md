# SAGAZ MOTORS 🏍️

Catálogo de motos elétricas desenvolvido em PHP 8 + MySQL + Bootstrap 5.

## 🚀 Funcionalidades

- **Catálogo completo** com filtros por categoria, preço e ordenação
- **Galeria de imagens** com suporte a PNG e SVG
- **Página de detalhes** com especificações técnicas
- **Simulador de parcelamento** interativo
- **WhatsApp integration** para contato direto
- **Design responsivo** (mobile-first)
- **Modelos relacionados** na página de detalhe

## 🛠️ Tecnologias

- PHP 8.3
- MySQL 8
- Bootstrap 5
- Font Awesome 6
- JavaScript (vanilla)

## 📦 Instalação

```bash
# Clonar repositório
git clone https://github.com/SallesCaio/SAGAZ-Motors.git

# Importar banco de dados
mysql -u root -p < sql/sagaz_motors.sql

# Configurar conexão
cp includes/db.php.example includes/db.php
# Editar includes/db.php com suas credenciais

# Iniciar servidor
php -S localhost:8000
```

## 📸 Modelos

| Modelo | Categoria | Motor | Autonomia | Preço |
|--------|-----------|-------|-----------|-------|
| M400 | Scooter | 400W | 40 km | R$ 5.022 |
| P400 | Scooter | 400W | 30 km | R$ 2.322 |
| OEK Tech | Scooter | 500W | 45 km | R$ 7.182 |
| TANK | Scooter | 1000W | 50 km | R$ 13.662 |
| AG 8 | Scooter | 1000W | 50 km | R$ 10.422 |
| AG 10 | Scooter | 1000W | 50 km | R$ 13.662 |
| AG 12 | Scooter | 1000W | 50 km | R$ 12.942 |
| AG 15 | Scooter | 1000W | 50 km | R$ 13.662 |
| N70 | Scooter | 1000W | 60 km | R$ 10.782 |
| Paris Retro | Scooter | 1000W | 60 km | R$ 10.782 |
| Dolphin GS | Scooter | 1000W | 50 km | R$ 10.782 |
| Harley X13 | Scooter | 1000W | 50 km | R$ 10.062 |
| V8 | Scooter | 1000W | 50 km | R$ 8.442 |
| Cargueira | Cargueira | 1000W | 50 km | R$ 9.900 |
| Triciclo | Triciclo | 1000W | 50 km | R$ 12.222 |
| Bike Yoyo | Bike | 350W | 30 km | R$ 4.302 |

## 📄 Licença

MIT License
