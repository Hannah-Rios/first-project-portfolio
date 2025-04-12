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
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm-password'];
    $user_type = $_POST['user_type'];
    $profile_pic = $_FILES['profile_pic'];

    // Validação dos dados
    $errors = [];

    // Verifique se algum campo está vazio
    if (empty($user) || empty($email) || empty($pass) || empty($confirm_pass) || empty($user_type) || empty($profile_pic)) {
        $errors[] = "Todos os campos são obrigatórios.";
    }

    // Verifique se o nome de utilizador tem pelo menos 3 caracteres
    if (strlen($user) < 3) {
        $errors[] = "O nome de utilizador deve ter pelo menos 3 caracteres.";
    }

    // Verifique se o email é válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "O email não é válido.";
    }

    // Verifique se a senha tem pelo menos 6 caracteres
    if (strlen($pass) < 6) {
        $errors[] = "A senha deve ter pelo menos 6 caracteres.";
    }

    // Verifique se as senhas coincidem
    if ($pass !== $confirm_pass) {
        $errors[] = "As senhas não coincidem.";
    }

    // Verifique se a foto de perfil foi carregada corretamente
    if ($profile_pic['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "Por favor, carregue uma foto de perfil.";
    }

    // Verifique o tipo e o tamanho do arquivo
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $maxFileSize = 5 * 1024 * 1024; // 5 MB

    if (!in_array($profile_pic['type'], $allowedTypes)) {
        $errors[] = "Tipo de arquivo inválido. Apenas JPEG, PNG e GIF são permitidos.";
    }

    if ($profile_pic['size'] > $maxFileSize) {
        $errors[] = "O arquivo é muito grande. O tamanho máximo permitido é 5 MB.";
    }

    // Se houver erros, retorne os erros em JSON
    if (!empty($errors)) {
        echo json_encode(['success' => false, 'message' => implode('<br>', $errors)]);
        exit;
    }

    // Verifique se o nome de utilizador já existe
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Nome de utilizador já existe.']);
        exit;
    }

    // Verifique se o email já existe
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Email já existe.']);
        exit;
    }

    // Criptografe a senha
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Tratar o upload da foto de perfil
    $uploadDir = 'uploads/'; // Pasta onde as fotos serão armazenadas
    $profilePicName = uniqid() . '_' . basename($profile_pic['name']); // Nome único para o arquivo
    $uploadFile = $uploadDir . $profilePicName;

    if (move_uploaded_file($profile_pic['tmp_name'], $uploadFile)) {
        // Insira os dados do utilizador no banco de dados
        $sql = "INSERT INTO users (username, email, password_hash, user_type, profile_pic) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $user, $email, $hashed_password, $user_type, $profilePicName);

        if ($stmt->execute()) {
            // Utilizador registrado com sucesso
            echo json_encode(['success' => true, 'message' => 'Registo bem-sucedido!']);
        } else {
            // Erro ao registrar
            echo json_encode(['success' => false, 'message' => 'Erro ao registrar o utilizador.']);
        }
    } else {
        // Erro ao carregar a foto de perfil
        echo json_encode(['success' => false, 'message' => 'Erro ao carregar a foto de perfil.']);
    }

    $stmt->close();
} else {
    // Método de requisição inválido
    echo json_encode(['success' => false, 'message' => 'Método de requisição inválido.']);
}

$conn->close();
?>