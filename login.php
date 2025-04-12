<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="description" content="Página de login do usuário.">
    <meta name="keywords" content="Jane Doe, web developer, front-end, back-end, projetos web">
    <meta name="author" content="Jane Doe">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet');

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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 1px solid #1E1E1E;
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
            margin-bottom: 10px;
            color: #E0E0E0;
            display: block;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form id="login-form" action="process_login.php" method="POST">
            <label for="username">Nome de utilizador:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Entrar">
            <p class="message" id="message"></p>
        </form>
        <p class="register-link">Não tem uma conta? Registe-se aqui.<a href="register.php">Registe-se</a></p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#login-form").submit(function(event) {
                event.preventDefault();

                // Obtém os dados do formulário
                let username = $("#username").val();
                let password = $("#password").val();

                // Envia os dados via AJAX
                $.ajax({
                    url: "process_login.php",
                    type: "POST",
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(response) {
                        response = JSON.parse(response);
                        if (response.success) {
                            // Redireciona para a página de perfil
                            window.location.href = "profile.php";
                        } else {
                            // Exibe a mensagem de erro
                            $("#error-message").html(response.message);
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