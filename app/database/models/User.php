<?php
    class User{
        private $firstName;
        private $lastName;
        private $password;
        private $contactNum;
        private $email;
        private $telegram;

        public function __construct($firstName, $lastName, $password, $email, $contactNum, $telegram){
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->password = $password; 
            $this->contactNum = $contactNum;
            $this->email = $email;
            $this->telegram = $telegram;
        }

        public function getFirstName(){
            return $this->firstName;
        }

        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;
        }

        public function getLastName()
        {
            return $this->lastName;
        }

        public function setLastName($lastName)
        {
            $this->lastName = $lastName;
        }

        public function getTelegram()
        {
            return $this->telegram;
        }

        public function setTelegram($telegram)
        {
            $this->telegram = $telegram;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function getContactNum()
        {
            return $this->contactNum;
        }

        public function setContactNum($contactNum)
        {
            $this->contactNum = $contactNum;
        }

        public function getEmail()
        {
            return $this->email;
        }

    }
?>