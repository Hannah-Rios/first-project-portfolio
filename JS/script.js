document.getElementById("contactForm").addEventListener("submit", function (event) {
    event.preventDefault();

    var name = document.getElementById("name").ariaValueMax;
    var birthDate = new Date(document.getElementById("birthDate"). value);
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;

    var today = new Date();
    var age = today.getFullYear() - birthDate.getFullYear();
    var monthDiff = today.getMonth() - birthDate.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    var phoneRegex = /^\d{9}$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (name === "" || birthDate === "" || phone === "" || email === "" || message === "") {
        alert("Todos os campos são obrigatórios.");
        return;
    }

    if (age < 18) {
        alert("Você deve ter mais de 18 anos para preencher este formulário.");
        return;
    }

    if (!phoneRegex.test(phone)) {
        alert("Insira um número de telefone válido (9 dígitos).");
        return;
    }

    if (!emailRegex.test(email)) {
        alert("Insira um e-mail válido.");
        return;
    }

    alert("Formulário enviado com sucesso!");
    document.getElementById("contactForm").requestFullscreen();
});