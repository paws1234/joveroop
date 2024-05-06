<?php

header("Content-Security-Policy: default-src 'self'");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");

require_once 'Database.php';
require_once 'Auth.php';

session_start();
session_regenerate_id();

$response = array();


if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    $response['success'] = false;
    $response['error'] = "CSRF token validation failed.";
    echo json_encode($response);
    exit;
}

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

if (empty($username) || empty($password)) {
    $response['success'] = false;
    $response['error'] = "Please enter both username and password.";
    echo json_encode($response);
    exit;
}


$servername = "localhost";
$db_username = "paws";
$db_password = "paws";
$database = "joverhacking";
$db = new Database($servername, $db_username, $db_password, $database);
$conn = $db->connect();
$auth = new Auth($conn);

if ($auth->login($username, $password)) {

    $_SESSION['authenticated'] = true;
    
    $response['success'] = true;
    $response['message'] = "Login successful";
    echo json_encode($response);
} else {
    $response['success'] = false;
    $response['error'] = "Invalid username or password.";
    echo json_encode($response);
}

$conn->close();

