<?php
    class DBModel {
        private $host = "localhost";
        private $dbname = "nat_agriculture";
        private $username = "smiffykmc";
        private $password = "";
        private $conn = "";
        
        public function __construct(){
            
        }
        
        /* START COW ENTRIES FOR DB*/
        public function saveCow($cow){
            try{
                $conn = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->username, $this->password);
                $sql = $conn->prepare("INSERT INTO cows (type, breed, gender, name, ownerId, price, county) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)");
                
                $sql->bindParam(1, $type);
                $sql->bindParam(2, $breed);
                $sql->bindParam(3, $gender);
                $sql->bindParam(4, $name);
                $sql->bindParam(5, $ownerId);
                $sql->bindParam(6, $price);
                $sql->bindParam(7, $county);
                
                $type = $cow->getType();
                $breed = $cow->getBreed();
                $gender = $cow->getGender();
                $name = $cow->getName();
                $ownerId = $cow->getOwnerId();
                $price = $cow->getPrice();
                $county = $cow->getCounty();
                
                $sql->execute();
                echo "Cow was saved!";
            } catch (PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
        }
        
        // Get All Cows
        public function getCows(){
            $arrayObj = array();
            
            try{
                $conn = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->username, $this->password);
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $cows = $conn->prepare("SELECT cowId, type, breed, gender, name, ownerId, price, county, rating FROM cows
                    LIMIT 10");
                $cows->execute();
                $result = $cows->fetchAll();
                foreach($result as $cow){
                    array_push($arrayObj, new Cow(
                        $cow['cowId'],
                        $cow['type'],
                        $cow['breed'],
                        $cow['gender'],
                        $cow['name'],
                        $cow['ownerId'],
                        $cow['price'],
                        $cow['county'],
                        $cow['rating']));
                }
                
            } catch (PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
            return $arrayObj;
        }
        
        // Get All Cows With A Rating Of $rating
        public function getCowRating($rating){
            $arrayObj = array();
            
            try{
                $conn = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->username, $this->password);
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $cows = $conn->prepare("SELECT cowId, type, breed, gender, name, ownerId, price, county, rating
                    FROM cows WHERE rating <= $rating ORDER BY rating DESC");
                $cows->execute();
                $result = $cows->fetchAll();
                foreach($result as $cow){
                    array_push($arrayObj, new Cow(
                        $cow['cowId'],
                        $cow['type'],
                        $cow['breed'],
                        $cow['gender'],
                        $cow['name'],
                        $cow['ownerId'],
                        $cow['price'],
                        $cow['county'],
                        $cow['rating']));
                }
                
            } catch (PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
            return $arrayObj;
        }
        
        // Get All Cows With A Name Of $name
        public function getCowNames($name){
            $arrayObj = array();
            
            try{
                $conn = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->username, $this->password);
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $cows = $conn->prepare("SELECT cowId, type, breed, gender, name, ownerId, price, county, rating
                    FROM cows WHERE name LIKE '$name%' ORDER BY name ASC");
                $cows->execute();
                $result = $cows->fetchAll();
                foreach($result as $cow){
                    array_push($arrayObj, new Cow(
                        $cow['cowId'],
                        $cow['type'],
                        $cow['breed'],
                        $cow['gender'],
                        $cow['name'],
                        $cow['ownerId'],
                        $cow['price'],
                        $cow['county'],
                        $cow['rating']));
                }
                
            } catch (PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
            return $arrayObj;
        }
        
        public function getCowBoth($name, $rating){
            $arrayObj = array();
            
            try{
                $conn = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->username, $this->password);
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $cows = $conn->prepare("SELECT cowId, type, breed, gender, name, ownerId, price, county, rating
                    FROM cows WHERE name LIKE '$name%' AND rating <= $rating");
                $cows->execute();
                $result = $cows->fetchAll();
                foreach($result as $cow){
                    array_push($arrayObj, new Cow(
                        $cow['cowId'],
                        $cow['type'],
                        $cow['breed'],
                        $cow['gender'],
                        $cow['name'],
                        $cow['ownerId'],
                        $cow['price'],
                        $cow['county'],
                        $cow['rating']));
                }
                
            } catch (PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
            return $arrayObj;
        }
        
        public function getCattle($ownerId){
            $arrayObj = array();
            
            try{
                $conn = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->username, $this->password);
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $cows = $conn->prepare("SELECT cowId, type, breed, gender, name, ownerId, price, county, rating
                    FROM cows WHERE ownerID = $ownerId");
                $cows->execute();
                $result = $cows->fetchAll();
                foreach($result as $cow){
                    array_push($arrayObj, new Cow(
                        $cow['cowId'],
                        $cow['type'],
                        $cow['breed'],
                        $cow['gender'],
                        $cow['name'],
                        $cow['ownerId'],
                        $cow['price'],
                        $cow['county'],
                        $cow['rating']
                    ));
                }
                
            } catch (PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            //var_dump($arrayObj);
            $conn = null;
            return $arrayObj;
        }
        
        public function getCow($cowId){
            $arrayObj = array();
            try{
                $conn = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->username, $this->password);
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $cows = $conn->prepare("SELECT cowId, type, breed, gender, name, ownerId, price, county, rating
                    FROM cows WHERE cowId = $cowId");
                $cows->execute();
                $result = $cows->fetchAll();
                foreach($result as $cow){
                    array_push($arrayObj, new Cow(
                        $cow['cowId'],
                        $cow['type'],
                        $cow['breed'],
                        $cow['gender'],
                        $cow['name'],
                        $cow['ownerId'],
                        $cow['price'],
                        $cow['county'],
                        $cow['rating']
                    ));
                }
                
            } catch (PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
            return $arrayObj;
        }
        
        /* START OWNER ENTRIES FOR DB */
        public function saveOwner($owner){
            try{
                $conn = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->username, $this->password);
                $sql = $conn->prepare("INSERT INTO owner (fName, lName, username, email, password, farmAddress, cows) 
                VALUES (?, ?, ?, ?, ?, ?, ?)");
                    
                $sql->bindParam(1, $fName);
                $sql->bindParam(2, $lName);
                $sql->bindParam(3, $username);
                $sql->bindParam(4, $email);
                $sql->bindParam(5, $password);
                $sql->bindParam(6, $farmAddress);
                $sql->bindParam(7, $cows);
                
                $fName = $owner->getFName();
                $lName = $owner->getLName();
                $username = $owner->getUsername();
                $password = $owner->getPassword();
                $email = $owner->getEmail();
                $farmAddress = $owner->getFarmAddress();
                $cows = $owner->getCows();
                
                $sql->execute();
                echo "Owner Saved!";
            } catch (PDOException $e){
                echo $e->getMessage();
            }
            $conn = null;
        }
        
        public function getOwner($username){
            $ownerArray;
            $ownerId;
            $fName;
            $lName;
            $oUsername;
            $email;
            $password;
            $farmAddress;
            $cows;
            
            try{
                $conn = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $owners = $conn->prepare("SELECT ownerId, fName, lName, username, password, farmAddress, cows
                    FROM owner WHERE username = '$username'");
                $owners->execute();
                $result = $owners->fetchAll();
                foreach($result as $owner){
                    $ownerId = $owner['ownerId'];
                    $fName = $owner['fName'];
                    $lName = $owner['lName'];
                    $oUsername = $owner['username'];
                    $email = $owner['email'];
                    $password = $owner['password'];
                    $farmAddress = $owner['farmAddress'];
                    $cows = $owner['cows'];
                }
                
                $ownerArray = array($ownerId, $fName, $lName, $oUsername, $email, $password, $farmAddress, $cows);
                
            } catch (PDOException $e){
                echo $e->getMessage();
            }
            $conn = null;
            
            return $ownerArray;
        }
        
        public function getOwnerFromID($ownerID){
            $ownerArray;
            $ownerId;
            $fName;
            $lName;
            $oUsername;
            $email;
            $password;
            $farmAddress;
            $cows;
            
            try{
                $conn = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $owners = $conn->prepare("SELECT * FROM owner WHERE ownerId = '$ownerID'");
                $owners->execute();
                $result = $owners->fetchAll();
                foreach($result as $owner){
                    $ownerId = $owner['ownerId'];
                    $fName = $owner['fName'];
                    $lName = $owner['lName'];
                    $oUsername = $owner['username'];
                    $email = $owner['email'];
                    $password = $owner['password'];
                    $farmAddress = $owner['farmAddress'];
                    $cows = $owner['cows'];
                }
                
                $ownerArray = array($ownerId, $fName, $lName, $oUsername, $email, $password, $farmAddress, $cows);
                
            } catch (PDOException $e){
                echo $e->getMessage();
            }
            $conn = null;
            
            return $ownerArray;
        }
        /* END OWNER ENTRIES FOR DB */
    }
?>