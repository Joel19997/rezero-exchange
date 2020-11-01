
        
<?php
            require_once "common.php";

            $my_email = $_POST["username"];
            $book_id = intval($_POST["book_id"]);
            $my_book_id = intval($_POST["my_book_id"]);
            //echo($my_email);
            #first get seller's ID
            $dao  = new BookListingDAO();
            
            $myListings = $dao->getListingByListingID($book_id);
            $listings = array("listings" => array());
            foreach($myListings as $book)
            {
                $listings["listing"][] = array(
                    'email' => $book->getOwnerEmail()
                );
            }
            $checkEmail = $listings['listing'];
            $trader_email = $checkEmail[0]['email'];
            
            echo($trader_email);
            echo($my_email);
            #Next, create a new tradelisting
            $tradeDao = new BookTradeDAO();
        
            $status = $tradeDao->createNewTrade($my_book_id, $book_id, $my_email, $trader_email);
            echo($status);
            #lastly, update both l_id availability values to pending (2)
            $dao->updateAvailability($my_book_id,2);
            $dao->updateAvailability($book_id,2);
            
            
            

?>