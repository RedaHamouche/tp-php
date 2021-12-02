<?php 
class FlashController {
    public static function setFlash($message) {
        $_SESSION['flash'] = htmlspecialchars($message);
    }
    
    public static function hasFlash() {
        return isset($_SESSION['flash']);
    }

    public static function getFlash() {
        if(isset($_SESSION['flash'])) {
            $message = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $message;
        }
    }
}
?>