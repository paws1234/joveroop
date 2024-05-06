<?php



header("Content-Security-Policy: default-src 'self'");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");


session_start();


$csrf_token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token;


setcookie('csrf_token', $csrf_token, [
    'secure' => true, 
    'httponly' => true, 
    'samesite' => 'Strict' 
]);


echo json_encode(['csrf_token' => $csrf_token]);

