<?php include "includes/header.php"; ?>

    <main class="container my-5">

    <section class="mb-5">
        <h2 class="mb-4">Os Meus Projetos</h2>
        <div class="row text-center">
            <div class="gallery" id="gallery">
            </div>
        </div>
    </section>

    <section id="simulacao-orcamento">
        <h2>Faça uma simulação de orçamento</h2>
        <form id="form-simulacao">
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="tipo-projeto">Qual seu projeto?</label>
            <select id="tipo-projeto" name="tipo-projeto" required>
                <option value="webdesign">Web Design</option>
                <option value="webdevelopment">Desenvolvimento Web</option>
                <option value="uxui">UX/UI</option>
            </select>

            <label for="tamanho-area">Tamanho do Projeto (páginas):</label>
            <input type="number" id="tamanho-area" name="tamanho-area" required>

            <label for="descricao">Descrição do Projeto:</label>
            <textarea id="descricao" name="descricao" required></textarea>

            <button type="submit">Simular Orçamento</button>
        </form>
        <div id="resultado-simulacao"></div>
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
            <a href="contactos.php" target="_blank" class="btn btn-primary">Entre em contacto</a>
        </div>
     </section>
    </main>

<?php include "includes/footer.php" ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>
<script src="JS/script.js"></script>

<script>

    const galleryData = [
        { thumb: "imagens/projeto1.jpeg", full: "imagens/projeto1.jpeg", title: "Projeto 1"},
        { thumb: "imagens/projeto2.jpeg", full: "imagens/projeto2.jpeg", title: "Projeto 2"},
        { thumb: "imagens/projeto3.jpeg", full: "imagens/projeto3.jpeg", title: "Projeto 3"},
        { thumb: "imagens/projeto4.jpeg", full: "imagens/projeto4.jpeg", title: "Projeto 4"},
    ];

    const galleryContainer = document.getElementById("gallery");

    galleryData.forEach(image => {
        const item = document.createElement("div");
        item.classList.add("gallery-item");

        const link = document.createElement("a");
        link.href = image.full;
        link.setAttribute("data-lightbox", "gallery");
        link.setAttribute("data-title", image.title);

        const img = document.createElement("img");
        img.src = image.thumb;
        img.alt = image.title;

        link.appendChild(img);
        item.appendChild(link);
        galleryContainer.appendChild(item);
    });

    document.getElementById("form-simulacao").addEventListener("submit", function (event) {
        event.preventDefault();

        const nome = document.getElementById("nome").value;
        const email = document.getElementById("email").value;
        const tipoProjeto = document.getElementById("tipo-projeto").value;
        const tamanhoProjeto = document.getElementById("tamanho-area").value;
        const descricao = document.getElementById("descricao").value;

        let precoPorPagina;

        switch (tipoProjeto) {
            case "webdesign":
                precoPorPagina = 200;
                break;
            case "webdevelopment":
                precoPorPagina = 400;
                break;
            case "uxui":
                precoPorPagina = 150;
                break;
            default:
                precoPorPagina = 0;
        }

        const orcamento = precoPorPagina * tamanhoProjeto;

        const resultadoDiv = document.getElementById("resultado-simulacao");
        resultadoDiv.innerHTML = `
        <h3>Resultado da Simulação</h3>
        <p>Nome: ${nome}</p>
        <p>Email: ${email}</p>
        <p>Tipo de Projeto: ${tipoProjeto}</p>
        <p>Tamanho do Projeto: ${tamanhoProjeto} páginas</p>
        <p>Descrição: ${descricao}</p>
        <p><strong>Orçamento Estimado: ${orcamento.toFixed(2)}€</strong></p>
        `;
    });
</script>
</body>
</html>