<?php
//Mga Headers ni ash/lloyd
header("Content-Security-Policy: default-src 'self'");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
//Ari ang class na mo Authenticate sa user credentials
class Auth {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function login($username, $password) {
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            
            if (password_verify($password, $user['password'])) {

                session_regenerate_id(true);
                
                $_SESSION['authenticated'] = true;
                $_SESSION['username'] = $username; 
                
                return true;
            }
        }
  
     //chuy chuy rani para di ma bruteforce not-proven pa
        usleep(rand(50000, 1000000)); 
        
        return false;
    }
}
