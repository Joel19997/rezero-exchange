<?php
    class UserDAO{

        # Retrieve all persons in the data store
        # Input: Nothing
        # Output: An array of Person objects
        public function retrieveAll() {
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "select * from users";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $results = [];
            while ($row = $stmt->fetch()){
                $lastName = $row['last_Name'];
                $firstName = $row['first_Name'];
                $password = $row['password'];
                $contactNum = $row['contact_Num'];  
                $email = $row['email'];  
                $telegram = $row['telegram'];       
                
                $user = new User($firstName, $lastName, $password, $email, $contactNum, $telegram);
                $results[] = $user;
            }
            $pdo = null;
            $stmt = null;
            return $results;
        }


        public function addUser($firstName, $lastName, $email, $password ,$contactNum, $telegram)
        {
            $conn = new ConnectionManager();
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "INSERT INTO USERS (email, last_Name, first_Name, password, contact_Num, telegram) 
            VALUES(:email, :last_Name, :first_Name, :password, :contact_Num, :telegram)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":first_Name",$firstName, PDO::PARAM_STR);
            $stmt->bindParam(":last_Name",$lastName, PDO::PARAM_STR);
            $stmt->bindParam(":password",$password, PDO::PARAM_STR);
            $stmt->bindParam(":telegram",$telegram, PDO::PARAM_STR);
            $stmt->bindParam(":contact_Num",$contactNum, PDO::PARAM_INT);
            $isAddOk = $stmt->execute();
            $pdo = null;
            $stmt = null;
            return $isAddOk;
        }

        public function selectUser($email) #Selects one user based on email
        {
            $conn = new ConnectionManager();
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "SELECT * FROM USERS WHERE EMAIL = email)"; 
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
            $results = [];
            while ($row = $stmt->fetch()){
                $lastName = $row['last_Name'];
                $firstName = $row['first_Name'];
                $password = $row['password'];
                $contactNum = $row['contact_Num'];  
                $email = $row['email'];  
                $telegram = $row['telegram'];       
                
                $user = new User($firstName, $lastName, $password, $email, $contactNum, $telegram);
                $results[] = $user;
            }
            $pdo = null;
            $stmt = null;
            return $results;
        }


    }
?>