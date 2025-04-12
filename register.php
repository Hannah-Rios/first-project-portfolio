<!doctype html>
<html lang="pt">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <meta name="description" content="Página de registo.">
        <meta name="keywords" content="Jane Doe, web developer, front-end, back-end, projetos web">
        <meta name="author" content="Jane Doe">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="CSS/style.css" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                background-color: #2C2C2C;
                color: #FFFFFF;
                font-family: 'Raleway', sans-serif;
                line-height: 1.6;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .container {
                width: 90%;
                max-width: 400px;
                background-color: #555555;
                padding: 10px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                max-height: 90vh;
                overflow-y: auto;
            }

            h1 {
                color: #FFFFFF;
                margin-bottom: 1rem;
                font-size: 2rem;
                text-align: center;
            }

            form {
                margin-top: 1rem;
            }

            label {
                margin-bottom: 5px;
                color: #E0E0E0;
                display: block;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"],
            select {
                width: 100%;
                padding: 10px;
                margin-bottom: 5px;
                border: 1px solid #C9A94F;
                border-radius: 4px;
                background-color: #666666;
                color: #FFFFFF;
            }

            input[type="file"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 5px;
                border: 1px solid #C9A94F;
                border-radius: 4px;
                background-color: #666666;
                color: #FFFFFF;
            }

            input[type="submit"] {
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 4px;
                background-color: #C9A94F;
                color: #FFFFFF;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #E0E0E0;
                color: #000000;
            }

            .message {
                color: red;
                text-align: center;
                margin-top: 10px;
            }

            .register-link {
                text-align: center;
                margin-top: 15px;
            }

            .register-link a {
                color: #C9A94F;
                text-decoration: none;
            }

            .register-link a:hover {
                text-decoration: underline;
            }

            /* Estilo adicional para o select */
            select {
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                background-image: url('data:image/svg+xml;utf8,<svg fill="%23C9A94F" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
                background-repeat: no-repeat;
                background-position: right 10px center;
                background-size: 12px;
            }

            /* Estilo adicional para o input file */
            input[type="file"] {
                cursor: pointer;
            }

            input[type="file"]::-webkit-file-upload-button {
                background-color: #C9A94F;
                color: #FFFFFF;
                border: none;
                padding: 8px 12px;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type="file"]::-webkit-file-upload-button:hover {
                background-color: #E0E0E0;
                color: #000000;
            }
        </style>
    </head>
 
    <body>
        <div class="container">
            <h1>Registo</h1>
            <form id="register-form" action="process_register.php" method="post" enctype="multipart/form-data">
                <label for="username">Nome de utilizador:</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm-password">Confirmar senha:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>

                <label for="user_type">Tipo de utilizador:</label>
                <select id="user_type" name="user_type" required>
                    <option value="1">Administrador</option>
                    <option value="2">Utilizador</option>
                </select>

                <label for="profile_pic">Foto de perfil:</label>
                <input type="file" id="profile_pic" name="profile_pic" required>
                
                <input type="submit" value="Registar">
                <p id="error-message" style="color: red;"></p>
            <p class="register-link">Já tem uma conta? <a href="login.php">Iniciar sessão</a></p>
            </form>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $("#register-form").submit(function(event) {
                event.preventDefault();

                let username = $("#username").val();
                let email = $("#email").val();
                let password = $("#password").val();
                let confirmPassword = $("#confirm-password").val();
                let usertype = $("#user_type").val();
                let profilePic = $("#profile_pic")[0].files[0]; // Acessa o arquivo selecionado
                let errorMessage = "";

                // Validações
                if (username.length < 3) {
                    errorMessage += "O nome de utilizador deve ter pelo menos 3 caracteres.<br>";
                }

                let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(email)) {
                    errorMessage += "O email não é válido.<br>";
                }

                if (password.length < 6) {
                    errorMessage += "A senha deve ter pelo menos 6 caracteres.<br>";
                }

                if (password !== confirmPassword) {
                    errorMessage += "As senhas não coincidem.<br>";
                }

                if (!profilePic) {
                    errorMessage += "Por favor, carregue uma foto de perfil.<br>";
                }

                // Exibe mensagens de erro
                if (errorMessage) {
                    $("#error-message").html(errorMessage);
                    return;
                }

                // Enviar dados via AJAX
                var formData = new FormData(this);
                $.ajax({
                    url: "process_register.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        try {
                            response = JSON.parse(response);
                            if (response.success) {
                                window.location.href = "login.php";
                            } else {
                                $("#error-message").html(response.message);
                            }
                        } catch (e) {
                            $("#error-message").html("Resposta inválida do servidor.");
                        }
                    },
                    error: function() {
                        $("#error-message").html("Ocorreu um erro ao processar o seu pedido.");
                    }
                });
            });
        });
        </script>
    </body>
</html>