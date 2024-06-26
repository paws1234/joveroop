<?php
//Mga Headers ni ash/lloyd
header("Content-Security-Policy: default-src 'self'");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");
session_start();

//chuy chuy ni na csrf token shit sayop ni di ni legit pero mahog ni siya as another way para di ma attack 
$csrf_token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token;


setcookie('csrf_token', $csrf_token, [
    'secure' => true, 
    'httponly' => true, 
    'samesite' => 'Strict' 
]);


echo json_encode(['csrf_token' => $csrf_token]);

