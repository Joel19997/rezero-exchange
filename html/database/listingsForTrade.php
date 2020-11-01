<?php
            require_once "common.php";

            //$book_id = $_GET["book_id"]; #get post value from previous page
            //$user = $_SESSION['email'];
            $user = $_POST["username"];
            //$user ="infinty@yahoo.com";
            //$book_id = intval($book_id);
            //$book_id = 4;
            //$user = 'yomhanks@yahoo.com';
            
            $dao  = new BookListingDAO();

            $myListings = $dao->getMyListings($user);
            $listings = array("listings" => array());
            foreach($myListings as $book)
            {
                $listings["listing"][] = array(
                    'lid' => $book->getLid(),
                    'isbn' => $book->getIsbn(),
                    "title" => $book->getTitle(),
                    'description' => $book->getDesc(),
                    "availability" => $book->getAvailability(),
                    'author' => $book->getAuthor(),
                    
                );
                
            }
            
            echo json_encode($listings);
            //var_dump($listings['listing']);
            
            
            

?>