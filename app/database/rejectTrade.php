<?php
            require_once "common.php";

            $book_id = intval($_POST["book_id"]);
            $my_book_id = intval($_POST["my_book_id"]);
            //echo($my_email);
            #first get seller's ID
            $dao  = new BookListingDAO();
            
            #Next, remove trade
            $tradeDao = new BookTradeDAO();
        
            $tradeDao->deleteTrade($my_book_id, $book_id);
            
            #lastly, update both l_id availability values to not available (3)
            $dao->updateAvailability($my_book_id,1);
            $dao->updateAvailability($book_id,1);
            
            
            

?>