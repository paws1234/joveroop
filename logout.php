//logout shits rani siya diri with csrf token// 
<?php
session_start();
if (!isset($_POST['csrf_token']) || !hash_equals($_POST['csrf_token'], $_SESSION['csrf_token'])) {
    http_response_code(403);
    exit("CSRF token validation failed.");
}


$_SESSION = array();


session_destroy();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}


$_SESSION = array();

header("Location: index.php");
exit;

