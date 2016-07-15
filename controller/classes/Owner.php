<?php
    class Owner{
        private $fName;
        private $lName;
        private $username;
        private $email;
        private $password;
        private $farmAddress;
        private $cows = 0;
        
        public function __construct($fName, $lName, $username, $email, $password, $farmAddress, $cows){
            $this->fName = $fName;
            $this->lName = $lName;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->farmAddress = $farmAddress;
            $this->cows = $cows;
        }
        
        public function getFName(){
            return $this->fName;
        }
        
        public function getLName(){
            return $this->lName;
        }
        
        public function getUsername(){
            return $this->username;
        }
        
        public function getEmail(){
            return $this->email;
        }
        
        public function getPassword(){
            return $this->password;
        }
        
        public function getFarmAddress(){
            return $this->farmAddress;
        }
        
        public function getCows(){
            return $this->cows;
        }
    }
?>