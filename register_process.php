<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: safe.php");
    exit;
}

header("Content-Security-Policy: default-src 'self'");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
require_once 'Database.php';
require_once 'Auth.php';
session_start();
session_regenerate_id();

$response = array();

if (!isset($_SESSION['csrf_token']) || !isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    $response['error'] = "CSRF token validation failed.";
    echo json_encode($response);
    exit;
}

$username = trim($_POST["username"]); 
$password = trim($_POST["password"]); 

if (empty($username) || empty($password)) { 
    $response['error'] = "Please enter both username and password.";
    echo json_encode($response);
    exit;
}

$username = filter_var($username, FILTER_SANITIZE_STRING);

$servername = "localhost";
$db_username = "paws";
$db_password = "paws";
$database = "joverhacking";
$db = new Database($servername, $db_username, $db_password, $database);
$conn = $db->connect();
$auth = new Auth($conn);
$sql = "SELECT id FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $response['error'] = "Username already exists.";
    echo json_encode($response);
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashedPassword);

if ($stmt->execute()) {
    $response['success'] = true;
    $response['message'] = "Registration successful";
    echo json_encode($response);
} else {
    $response['success'] = false;
    $response['error'] = "Registration failed";
    echo json_encode($response);
}

