<?php
    include("assets/libraries/lib/password.php");

    class EncryptPassword {
        
        public function __construct(){
        }
        
        // Returns TRUE or FALSE if the $input parameter matches
        // the $hashedPassword parameter.
        public function verifyPassword($input, $hashedPassword){
            return password_verify($input, $hashedPassword);
        }
        
        // Encrypts the $password variable and returns it.
        public function encryptPassword($password){
            return password_hash($password, PASSWORD_BCRYPT);
        }
    }
?>