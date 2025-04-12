<?php
include "db.php";

$projects = [];

if (isset($_GET["search"])) {
    $search = htmlspecialchars($_GET["search"]);
    $sql = "SELECT * FROM projects WHERE name LIKE ? OR description LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeSearch = "%$search%";
    $stmt->bind_param("ss", $likeSearch, $likeSearch);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
    $stmt->close();
} else {
    $sql = "SELECT * FROM projects";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["project_name"]) && isset($_POST["project_description"])) {
    $image = " ";
    if (isset($_FILES["project_image"]) && $_FILES["project_image"]["error"] == UPLOAD_ERR_OK) {
        $image = "uploads/" . basename($_FILES["project_image"]["name"]);
        move_uploaded_file($_FILES["project_image"]["tmp_name"], $image);
    }

    $name = htmlspecialchars($_POST["project_name"]);
    $description = htmlspecialchars($_POST["project_description"]);
    $sql = "INSERT INTO projects (name, description, image) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $description, $image);
    $stmt->execute();
    $stmt->close();

    header("Location: admin.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Meu Portfólio</title>
        <link rel="stylesheet" href="css/style_php.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet');

            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            }

            body {
            background-color: #dddee4;
            color: #32327d;
            font-family: "Raleway", Lato;
            line-height: 1.6;
            }

            header {
            background-color:rgb(190, 190, 199);
            padding: 1rem;
            }

            header .container {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            #branding h1 {
                color: #141415;
                margin: 0;
            }

            nav ul {
                list-style: none;
                display: flex;
                gap: 1rem;
            }

            nav ul li {
                display: inline;
            }

            nav ul li a {
                color: #141415;
                text-decoration: none;
            }

            nav ul li a:hover {
                color:rgb(242, 242, 242);
            }

            main {
                padding: 2rem 0;
            }

            h1 {
                color: #141415;
                margin-bottom: 1rem;
                font-size: 60px;
            }

            h2 {
                color: #32327d;
                font-size: 62px;
                margin-bottom: 1rem;
                border-bottom: 2px solid #141415;
                padding-bottom: 0.5rem;
            }

            h3 {
                color: #32327d;
                font-size: 40px;
            }

            p {
                margin-bottom: 1rem;
                color: #141415;
            }

            form {
                margin-top: 1rem;
                padding: 20px;
                border: 1px solid #141415;
                border-radius: 8px;
                background-color: #32327d;
            }

            label {
                margin-top: 10px;
                color: rgb(242, 242, 242);
            }

            input, textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #32327d;
                border-radius: 4px;
                background-color:rgb(230, 230, 230);
                color: rgb(242, 242, 242);
            }

            input[type="file"] {
                padding: 0;
            }

            input[type="submit"] {
                background-color: rgb(230, 230, 230);
                color: #141414;
                border: rgb(242, 242, 242);
                cursor: pointer;
                border-radius: 4px;
                padding: 10px;
            }

            input[type="submit"]:hover {
                background-color: #454556;
                color: rgb(242, 242, 242);
                border-color: 1px solid #32327d;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 1rem;
            }

            table, th, td {
                border: 1px solid rgb(242, 242, 242);
            }

            th, td {
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: rgb(230, 230, 230);
                color: #141414;
            }

            td {
                background-color: rgb(230, 230, 230);
            }

            img {
                max-width: 150px;
                height: auto;
            }

            @media (max-width: 1024px) {
                nav ul {
                    flex-direction: column;
                    text-align: center;
                }
                nav ul li {
                    margin: 0.5rem 0;
                }
                .container {
                    flex-direction: column;
                }
            }
        </style>
    </head>

    <body>
        <header>
            <div class="container">
                <div id="branding">
                    <h1>Olá Admin!</h1>
                </div>
                <nav>
                    <ul>
                        <li><a href="index.php">Início</a></li>
                        <li><a href="admin.php">Administração</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <section id="showcase">
            <div class="container">
                <h1>Bem-vindo à Página de Administração</h1>
                <p>Faça a gestão dos seus projetos abaixo:</p>
            </div>
        </section>

        <form action="admin.php" method="get">
            <label for="search">Buscar Projetos:</label>
            <input type="text" id="search" name="search" placeholder="Nome ou Descrição do Projeto">
            <input type="submit" value="Bsucar">
        </form>

            <h2 id="projects">Meus Projetos</h2>
            <?php if ($projects): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nome do Projeto</th>
                            <th>Descrição</th>
                            <th>Imagem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project): ?>
                            <tr>
                                <td><?php echo $project["name"]; ?></td>
                                <td><?php echo $project["description"]; ?></td>
                                <td><img src="<?php echo $project["image"]; ?>" alt="<?php echo $project["name"]; ?>" width="100"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                    <p>Nenhum projeto encontrado.</p>
                <?php endif; ?>
        
        <h2>Adicionar Novo Projeto</h2>
            <form action="admin.php" method="post" enctype="multipart/form-data">
                <label for="project_name">Nome do Projeto:</label><br>
                <input type="text" id="project_name" name="project_name" required><br><br>
                <label for="project_description">Descrição do Projeto:</label><br>
                <textarea id="project_description" name="project_description" required></textarea><br><br>
                <label for="project_image">Imagem do Projeto:</label><br>
                <input type="file" id="project_image" name="project_image" accept="image/*"><br><br>
                <input type="submit" value="Adicionar Projeto">
            </form>    
    </body>
</html>