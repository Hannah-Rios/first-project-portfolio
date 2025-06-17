<?php
    include "includes/header.php";
?>

        <main class="container my-5">
            <section class="mb-5" style="margin: 20px 0px;">
                <h2 class="mb-4">Contacte-me</h2>
                <form id="contactForm">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="birthDate" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="birthDate" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="phone" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label class="message form-label">Mensagem</label>
                    <textarea class="form-control" id="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </section>

            <section class="mb-5" style="margin: 20px 0px;">
                <h2 class="mb-4">Onde Estou</h2>
                <div>
                    <label for="destination" class="form-label">Qual a sua localização?</label>
                    <input type="text" id="destination" class="form-control" style="margin: 20px 0px;">
                    <button onclick="calculateRoute()" class="btn btn-primary">Calcular rota</button>
                </div>
                <div id="map" style="margin: 20px 0px;"></div>
            </section>

            <section id="faq">
                <h2>Perguntas Frequentes</h2>
                <div class="faq-item">
                    <h3 class="faq-question">O que é Web Design e por que é importante?</h3>
                    <div class="faq-answer">
                        <p>Web Design refere-se à criação e layout de um site, incluindo aspectos como estrutura, design visual, cores, fontes e imagens. Um bom design de um site é crucial para atrair visitantes, além de melhorar a usabilidade e experiência do utilizador.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <h3 class="faq-question">Qual a diferença entre Web Development e Web Design?</h3>
                    <div class="faq-answer">
                        <p>Web Design é focado na aparência visual e na experiência do utilizador de um site, enquanto Web Develoment envolve a construção e a manutenção do site usando código. Os desenvolvedores web trabalham com linguagens como HTML, CSS, JavaScript, PHP e bancos de dados para criar a funcionalidade do site.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <h3 class="faq-question">O que é UX/UI Design?</h3>
                    <div class="faq-answer">
                        <p>UX (User Experience) Design foca-se na usabilidade, acessibilidade e na experiência geral do utilizador ao interagir com um produto digital. UI (User Interface) Design é a prátrica de crir interfaces digitais com foco na aparência e no estilo. Ambos são essenciais para criar produtos digitais que sejam fáceis de usar e visualmente atraentes.</p>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">Quanto tempo leva para desenvolver um site?</h3>
                        <div class="faq-answer">
                            <p>O tempo para desenvolver um site pode variar dependendo da complexidade do projeto. Sites simples podem levar algumas semanas, enquanto projetos mais complexos, como e-commerces ou plataformas personalizadas, podem levar vários meses.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">Quais informações são necessárias para iniciar um projeto de Web Development?</h3>
                        <div class="faq-answer">
                            <p>Para iniciar um projeto, precisamos de uma descrição clara do seu negócio, objetivos do site, funcionalidades desejadas, conteúdo, exemplos de sites que você gosta e, se possível, wireframes ou protótipos.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">Qual é o custo médio para desenvolver um site?</h3>
                        <div class="faq-answer">
                            <p>O custo pode variar amplamente dependendo do objetuvo e das funcionalidades do projeto. Sites básicos podem começar a partir de 400€, enquanto projetos mais avançados podem custar de 2.000€ a 10.000€ ou mais.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">O que é um site responsivo?</h3>
                        <div class="faq-answer">
                            <p>Um site responsivo é aquele que se adapta automaticamente ao tamanho da tela do dispositivo do utilizador, porporcionando uma boa experiência tanto em computadores quanto em dispositivos móveis, como smartphones e tablets.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">Por que devo investir em UX/UI Design?</h3>
                        <div class="faq-answer">
                            <p>Investir em UX/UI Design pode melhorar significativamente a satisfação do utilizador, aumentar a conversão e retenção de clientes, reduzir custos de desenvolvimento no longo prazo e proporcionar uma vantagem competitiva ao oferecer uma experiência de alta qualidade.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">Como posso garantir que o meu site seja encontrado nos motores de busca?</h3>
                        <div class="faq-answer">
                            <p>Para garantir que seu site seja encontrado, é importante otimizar o seu conteúdo e estrutura para motores de busca (SEO), criar conteúdo relevante e de alta qualidade e obter blacklinks de outros sites respeitáveis.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">O que acontece após o site ser lançado?</h3>
                        <div class="faq-answer">
                            <p>Após o lançamento, oferecemos suporte contínuo e manutenção para garantir que o site funcione perfeitamente. Também podemos ajudar com atualizações, melhorias de segurança, backup de dados e otimizações de performance.</p>
                        </div>
                    </div>
                </div>
            </section>

        <section class="mb-5">
            <h2 class="mb-4">Vamos conversar</h2>
            <div class="row text-center">
            <div class="col-md-4">
                <h4>Envie uma mensagem</h4>
                <p>Entre em contato através do meu e-mail ou pelas redes sociais.</p>
            </div>
            <div class="col-md-4">
                <h4>Agende uma reunião</h4>
                <p>Marque uma reunião para discutir seu projeto em detalhes.</p>
            </div>
            <div class="col-md-4">
                <h4>Conecte-se comigo</h4>
                <p>Siga-me nas redes sociais para acompanhar minhas novidades.</p>
            </div>
            </div>
            <div class="text-center mt-4">
                <a href="contactos.html" target="_blank" class="btn btn-primary">Entre em contacto</a>
            </div>
        </section>
    </main>

<?php 
    include "includes/footer.php";
?>

    <script src="JS/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        var fixedLocation = L.latLng(38.736946, -9.142685);
        var map = L.map("map").setView(fixedLocation, 13);
        var marker = L.marker(fixedLocation).addTo(map);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "© OpenStreetMap contributors"
        }) .addTo(map);

        function calculateRoute() {
            var destination = document.getElementById("destination").value;
            var url = "https://nominatim.openstreetmap.org/search?format=json&q=" + destination;

            fetch(url)
            .then(function (response) {
                return response.json();
            })
            .then(function (json) {
                var lat = json[0].lat;
                var lon = json[0].lon; 
                var routeUrl = "https://www.openstreetmap.org/directions?engine=graphhopper_car&route=" + fixedLocation.lat + "," + fixedLocation.lng + ";" + lat + "," + lon;
                    window.open(routeUrl, "_blank");
               });
        }

        $(document).ready(function () {
    $(".faq-question").on("click", function () {
        $(this).next(".faq-answer").slideToggle();
        $(this).parent().siblings().find(".faq-answer").slideUp();
    });
});
    </script>
    </body>
</html>