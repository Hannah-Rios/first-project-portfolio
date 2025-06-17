<?php 
    include "includes/header.php"; 
?>

        <main class="container my-5">
            <div class="row mb-5">
                <div class="col-md-5">
                    <img src="imagens/perfil.jpeg" alt="meu-projeto" class="img-fluid">
                <div class="col-md-7 align-self-center">
                    <h1>Olá. Eu sou Hannah Rios e sou web developer!</h1>
                </div>
                </div>
            <div class="row mb-5">
                <div class="col-12">
                    <h2>Sobre Mim</h2>
                    <p> Sou apaixonada por criar expêriencias digitais envolventes e intuitivas. Posso ajudar sua ideia a se tornar realidade!</p>
                    <a class="btn btn-primary" href="projetos.html" target="_blank">Conheça o meu trabalho</a>
                </div>
            </div>

            <section class="mb-5">
                <h2 class="mb-4">As minhas skills</h2>
                <div class="row text-center">
                    <div class="col-md-4">
                        <h3>Desenvolvimento Front-end</h3>
                        <p>Domino HTML, CSS e JavaScript para criar interfaces responsivas e interativas.</p>
                        <img src="imagens/frontend.jpg" alt="meu-projeto" class="img-fluid">
                    </div>
                <div class="col-md-4">
                    <h3>Desenvolvimento Back-end</h3>
                    <p>Construo soluções robustas e seguras com PHP e bases de dados.</p>
                    <img src="imagens/backend.jpg" alt="meu-projeto" class="img-fluid">
                    </div>
                <div class="col-md-4">
                    <h3>Design de UX/UI</h3>
                    <p>Penso no utilizador em cada etapa, projetando layouts limpos e experiências intuitivas.</p>
                    <img src="imagens/uxui.jpeg" alt="meu-projeto" style="width: 400px; height: auto; margin-top: 10px;">
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="sobre.html" target="_blank" class="btn btn-primary">Saiba mais sobre mim</a>
                </div>
            </section>

            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="imagens/ecommerce.jpeg" class="d-block w-100" alt="meu-projeto">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>E-commerce:</h5>
                      <p>Desenvolvimento de uma plataforma de e-commerce personalizável e otimizada para vendas online.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="imagens/appmovel.jpg" class="d-block w-100" alt="meu-projeto">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Aplicação Móvel:</h5>
                      <p>Criação de uma aplicação móvel com design minimalista e recursos interativos.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="imagens/site.jpeg" class="d-block w-100" alt="meu-projeto">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Site Institucional:</h5>
                      <p>Construção de um site institucional moderno e responsivo para melhorar a presença digital.</p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>

            <section class="mb-5">
                <h2 class="mb-4">Experiência profissional</h2>
                <div class="row">
                    <div class="col-md-3">
                        <img src="imagens/expprofissional.jpg" alt="meu-projeto" class="img-fluid">
                    </div>
                    <div class="col-md-9">
                        <ol class="list-unstyled">
                            <li class="mb-3"><strong>Creator Moderator:</strong> Crio conteúdos sobre desenvolvimento web nas redes sociais.</li>
                            <li class="mb-3"><strong>Freelancer de Desenvolvimento Web:</strong> Trabalhei com diversos clientes, desde pequenas empresas até startups, entregando soluções personalizadas.</li>
                            <li class="mb-3"><strong>Web Developer Júnior:</strong> Iniciei a minha experiência profissional numa empresa de web development.</li>
                        </ol>
                        <a href="uploads/HannahSilva-Curriculo.pdf" download class="btn btn-primary">CV Download</a>
                    </div>
                </div>
            </section>

            <section class="mb-5">
                <h2 class="mb-4">Serviços oferecidos</h2>
                <div class="row text-center">
                    <div class="col-md-6 mb-4">
                        <h3>Desenvolvimento web</h3>
                        <p>Construo sites e aplicações web responsivos e de alto desempenho.</p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <h3>Design de UX/UI</h3>
                        <p>Crio designs intuitivos e experiências de usuário envolventes.</p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <h3>Integração back-end</h3>
                        <p>Implemento soluções back-end robustas e seguras.</p>
                    </div>
                </div>
            </section>

            <section class="mb-5">
                <h2 class="mb-4">O que dizem os meus clientes</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="imagens/cliente1.jpeg" class="card-img-top" alt="meu-projeto">
                                <h5 class="card-title">Ana Monteiro</h5>
                                <p class="card-text" style="color: black;">"Projetos incríveis e únicos"</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="imagens/cliente2.jpeg" class="card-img-top" alt="meu-projeto">
                                <h5 class="card-title">Felipe Nascimento</h5>
                                <p class="card-text" style="color: black;">"Todos os detalhes pensados cuidadosamente"</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="imagens/cliente3.jpg" class="card-img-top" alt="meu-projeto">
                                <h5 class="card-title">Marta Cardoso</h5>
                                <p class="card-text" style="color: black;">"Profissionalismo em todos os níveis"</p>
                            </div>
                        </div>
                    </div>
                </div>
                </section>

            <section class="mb-5">
                <h2 class="mb-4">Vamos conversar</h2>
                <div class="row text-center">
                    <div class="col-md-4">
                        <h4>Envie-me uma mensagem</h4>
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
            </div>
        </main>

    <?php include "includes/footer.php"; ?>

    </body>
</html>