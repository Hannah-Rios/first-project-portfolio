<?php
session_start();

// Configurações da base de dados
$servername = "localhost";
$username = "root"; // Substitua pelo seu usuário do MySQL
$password = ""; // Substitua pela sua senha do MySQL
$dbname = "portfolio"; // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Erro ao conectar à base de dados: ' . $conn->connect_error]));
}

// Verifique se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtenha os dados do formulário
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Validação dos dados
    $errors = [];

    if (empty($user) || empty($pass)) {
        $errors[] = "Todos os campos são obrigatórios.";
    }

    // Se houver erros, retorne os erros em JSON
    if (!empty($errors)) {
        echo json_encode(['success' => false, 'message' => implode('<br>', $errors)]);
        exit;
    }

    // Verifique se o nome de utilizador existe
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo json_encode(['success' => false, 'message' => 'Nome de utilizador não encontrado.']);
        exit;
    }

    // Obtenha os dados do utilizador
    $userData = $result->fetch_assoc();

    // Verifique a senha
    if (password_verify($pass, $userData['password_hash'])) {
        // Login bem-sucedido
        $_SESSION['user_id'] = $userData['id']; // Adicione esta linha
        $_SESSION['username'] = $userData['username'];
        $_SESSION['user_type'] = $userData['user_type'];
        echo json_encode(['success' => true, 'message' => 'Login bem-sucedido!']);
    } else {
        // Senha incorreta
        echo json_encode(['success' => false, 'message' => 'Senha incorreta.']);
    }

    $stmt->close();
} else {
    // Método de requisição inválido
    echo json_encode(['success' => false, 'message' => 'Método de requisição inválido.']);
}

$conn->close();
?>