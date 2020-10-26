<?php
    class BookTrade{
        private $firstLid;
        private $secLid;
        private $firstEmail;
        private $secEmail;
        private $availability;

        public function __construct($firstLid, $secLid, $firstEmail, $secEmail, $availability = 1){
            $this->firstLid = $firstLid;
            $this->secLid = $secLid;
            $this->firstEmail = $firstEmail; 
            $this->secEmail = $secEmail;
            $this->availability = $availability;
        }

        public function getFirstLid()
        {
            return $this->firstLid;
        }

        public function setFirstLid($firstLid)
        {
            $this->firstLid = $firstLid;
        }

        public function getSecLid()
        {
            return $this->secLid;
        }

        public function setSecLid($secLid)
        {
            $this->secLid = $secLid;
        }

        public function getFirstEmail()
        {
            return $this->firstEmail;
        }

        public function setFirstEmail($firstEmail)
        {
            $this->firstEmail = $firstEmail;
        }

        public function getSecEmail()
        {
            return $this->secEmail;
        }

        public function setSecEmail($secEmail)
        {
            $this->secEmail = $secEmail;
        }

        public function getAvailability()
        {
            return $this->availability;
        }

        public function setAvailability($availability)
        {
            $this->availability = $availability;
        }
    }