<?php
    class bookListing{
        private $l_id;
        private $ownerEmail;
        private $isbn;
        private $book_title;
        private $listing_desc;
        private $genre;
        private $availability;
        private $author;
        

        public function __construct($l_id, $ownerEmail, $book_title, $isbn, $genre, $listing_desc, $availability, $author){
            $this->l_id = $l_id;
            $this->ownerEmail = $ownerEmail;
            $this->book_title = $book_title;
            $this->genre = $genre; 
            $this->listing_desc = $listing_desc;
            $this->isbn = $isbn;
            $this->availability = $availability;
            $this->author = $author;
        }
        

        public function getOwnerEmail()
        {
            return $this->ownerEmail;
        }

        public function getLid()
        {
            return $this->l_id;
        }

        public function getIsbn()
        {
            return $this->isbn;
        }

        public function getTitle()
        {
            return $this->book_title;
        }

        public function getDesc()
        {
            return $this->listing_desc;
        }

        public function setDesc($desc)
        {
            $this->desc = $desc;
        }

        public function getGenre()
        {
            return $this->genre;
        }

        public function setGenre($genre)
        {
            return $this->genre = $genre;
        }

        public function getAvailability()
        {
            return $this->availability;
        } 

        public function setAvailability($status)
        {
            $this->availability = $status;
        }

        public function getAuthor()
        {
            return $this->author;
        }

    }


?>