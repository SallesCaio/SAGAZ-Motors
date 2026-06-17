<?php
// includes/footer.php
?>
    </main>

  <footer class="bg-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <img src="img/logo.png" alt="SAGAZ MOTORS" height="60" class="mb-3">
                    <p>Motos elétricas com o melhor custo-benefício. Economia, sustentabilidade e performance.</p>
                    <div class="social-links">
                        <a href="https://instagram.com/sagazmotors" target="blank" class="text-white me-3">
                            <i class="fa-brands fa-instagram fa-lg"></i>
                        </a>
                        <a href="https://facebook.com/sagazmotors" target="blank" class="text-white me-3">
                            <i class="fa-brands fa-facebook fa-lg"></i>
                        </a>
                        <a href="https://wa.me/5521999052694" target="blank" class="text-white">
                            <i class="fa-brands fa-whatsapp fa-lg"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-2 mb-4">
                    <h5>Navegação</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white-50">Início</a></li>
                        <li><a href="pages/catalogo.php" class="text-white-50">Catálogo</a></li>
                        <li><a href="pages/contato.php" class="text-white-50">Contato</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-4">
                    <h5>Categorias</h5>
                    <ul class="list-unstyled">
                        <li><a href="pages/catalogo.php?cat=scooters" class="text-white-50">Scooters</a></li>
                        <li><a href="pages/catalogo.php?cat=cargueiras" class="text-white-50">Cargueiras</a></li>
                        <li><a href="pages/catalogo.php?cat=bikes" class="text-white-50">Bikes Elétricas</a></li>
                        <li><a href="pages/catalogo.php?cat=triciclos" class="text-white-50">Triciclos</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-4">
                    <h5>Contato</h5>
                    <ul class="list-unstyled text-white-50">
                        <li><i class="fa-solid fa-location-dot me-2"></i> Av. Paranapuã 1771, Tauá - RJ</li>
                        <li><i class="fa-solid fa-phone me-2"></i> +55 (21) 99905-2694</li>
                        <li><i class="fa-solid fa-envelope me-2"></i> contato@sagazmotors.com.br</li>
                    </ul>
                </div>
            </div>

            <hr class="border-secondary">
            <div class="text-center text-white-50">
                <p>&copy; <?= date('Y') ?> SAGAZ MOTORS. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Flutuante -->
    <a href="https://wa.me/5521999052694?text=Olá! Tenho interesse em uma moto elétrica."
       class="whatsapp-float" target="_blank">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html>