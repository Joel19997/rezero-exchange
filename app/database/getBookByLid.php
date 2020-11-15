<?php
            require_once "common.php";

            $book_id = intval($_POST["book_id"]);
           //$book_id = 15;
           
          
            $dao  = new BookListingDAO();
            
            $myListings = $dao->getListingBylid($book_id);
            $listings = array("listing" => array());
            foreach($myListings as $book)
            {
                $listings["listing"][] = array(
                    "lid" => $book->getLid(),
                    "isbn" => $book->getIsbn(),
                    "title" => $book->getTitle(),
                    "description" => $book->getDesc(),
                    "availability" => $book->getAvailability(),
                    "author" => $book->getAuthor()
        
                );
            }
            echo json_encode($listings);
            
?>
            
