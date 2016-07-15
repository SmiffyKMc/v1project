<?php 
    class Cow {
        private $cowId;
        private $type;
        private $breed;
        private $gender;
        private $name;
        private $ownerId;
        private $price;
        private $county;
        private $rating;
        
        public function __construct($cowId, $type, $breed, $gender, $name, $ownerId, $price, $county, $rating){
            $this->cowId = $cowId;
            $this->type = $type;
            $this->breed = $breed;
            $this->gender = $gender;
            $this->name = $name;
            $this->ownerId = $ownerId;
            $this->price = $price;
            $this->county = $county;
            $this->rating = $rating;
        }
        
        public function setCowId($cowId){
            $this->cowId = $cowId;
        }
        
        public function getRating(){
            return $this->rating;
        }
        
        public function getCowId(){
            return $this->cowId;
        } 
        
        public function getType(){
            return $this->type;
        }
        
        public function getBreed(){
            return $this->breed;
        }
        
        public function getGender(){
            return $this->gender;
        }
        
        public function getName(){
            return $this->name;
        }
        
        public function getOwnerId(){
            return $this->ownerId;
        }
        
        public function getPrice(){
            return $this->price;
        }
        
        public function getCounty(){
            return $this->county;
        }
    }
?>