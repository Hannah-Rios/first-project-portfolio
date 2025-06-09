<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifique se o utilizador está logado
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

include "db.php";
include "header.php";

// Busque os dados do utilizador
$stmt = $pdo->prepare("SELECT username, email, user_type, profile_pic FROM users WHERE id = ?");
$stmt->execute([$_SESSION["user_id"]]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header("Location: index.php");
    exit;
}
?>

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

        .user-info {
            margin-top: 1rem;
            text-align: center;
        }

        .user-info img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .user-info label {
            margin-bottom: 10px;
            color: #E0E0E0;
            display: block;
        }

        .user-info p {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #C9A94F;
            border-radius: 4px;
            background-color: #666666;
            color: #FFFFFF;
        }

        .logout-button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #C9A94F;
            color: #FFFFFF;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #E0E0E0;
            color: #000000;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Perfil</h1>
        <div class="user-info">
            <?php if (!empty($user["profile_pic"])): ?>
                <img src="<?php echo htmlspecialchars($user["profile_pic"]); ?>" alt="meu-projeto">
            <?php endif; ?>
            <label>Nome de utilizador:</label>
            <p><?php echo htmlspecialchars($user["username"]); ?></p>
            <label>Email:</label>
            <p><?php echo htmlspecialchars($user["email"]); ?></p>
            <label>Tipo de utilizador:</label>
            <p><?php echo htmlspecialchars($user["user_type"]); ?></p>
        </div>
        <form action="logout.php" method="POST">
            <input type="submit" class="logout-button" value="Logout">
        </form>
    </div>

<?php 
    include "footer.php";
?>

    </body>
</html>