<?php 
    include "header.php";
?>

    <main class="container my-5">
        <div class="row">
            <h2>Serviços oferecidos</h2>
            <div class="col-md-3">
                <div id="servicos-container" class="list-group">
                </div>
            </div>
            <div class="col-md-9">
                <div id="servico-detalhes" class="service-details">
                </div>
            </div>
        </div>

        <section class="mb-5">
            <h2 class=mb-4>Vamos conversar</h2>
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
                    <h4>Conect-se comigo</h4>
                    <p>Siga-me nas redes sociais para acompanhar minhas novidades.</p>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="contactos.html" target="_blank" class="btn bnt-primary">Entre em contacto</a>
            </div>
        </section>
    </main>

<?php
    include "footer.php"
?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>
    <script src="JS/script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const servicosContainer = document.getElementById("servicos-container");
            const servicoDetalhes = document.getElementById("servico-detalhes");

            function loadServicos() {
                fetch("JSON/servicos.json")
                .then(response => {
                    if (!response.ok) throw new Error("Erro na resposta da rede: " + response.statusText);
                    return response.json();
                })
                .then(data => {
                    const servicos = data.servicos;
                    let html = "";

                    servicos.forEach((servico, index) => {
                        html += `
                        <button class="list-group-item list-group-item-action" data-index="${index}">
                            ${servico.titulo}
                            </button>
                            `;
                    });

                    servicosContainer.innerHTML = html;

                    document.querySelectorAll(".list-group-item").forEach(button => {
                        button.addEventListener("click", function () {
                            const index = this.getAttribute("data-index");
                            showServicoDetalhes(servicos[index]);
                        });
                    });
                })

                .catch(error => {
                    servicosContainer.innerHTML = "<p>Desculpe, houve um erro ao carregar os serviços: " + error.message + "</p>";
                });
            }

            function showServicoDetalhes(servico) {
                servicoDetalhes.innerHTML = `
                <h3>${servico.titulo}</h3>
                <p>${servico.descricao}</p>
                <img src="${servico.imagem}" alt="${servico.titulo}" class="img-fluid">
                `;
            }

            loadServicos();
        });
    </script>

</body>
</html>