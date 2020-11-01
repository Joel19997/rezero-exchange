<?php
    class BookTradeDAO{
        
        function createNewTrade($firstLid, $secLid, $firstEmail, $secEmail)
        {
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "INSERT INTO TRADES(first_lid, sec_lid, first_email, sec_email) VALUES(first_lid = :firstLid, sec_lid = :secLid, firstEmail = :firstEmail, secEmail = :secEmail)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':firstLid', $firstLid, PDO::PARAM_STR);
            $stmt->bindParam(':secLid', $secLid, PDO::PARAM_STR);
            $stmt->bindParam(':firstEmail', $firstEmail, PDO::PARAM_STR);
            $stmt->bindParam(':secEmail', $secEmail, PDO::PARAM_STR);

            $isOk = $stmt->execute();

            $stmt = null;
            $pdo = null;
            return $isOk;
        }

        function getMyTrades($userEmail)
        {
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "SELECT * FROM TRADES where first_email = :userEmail";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
            
            $stmt->execute();

            $results = [];
            while ($row = $stmt->fetch()){
                $my_email = $row['first_email'];
                $trader_email = $row['sec_email'];
                $f_lid = $row['first_lid'];
                $s_lid = $row['sec_lid'];        
                
                $book = new bookTrade($f_lid,$s_lid,$my_email,$trader_email);
                $results[] = $book;
            }


            $stmt = null;
            $pdo = null;
            return $results;
        }


        function deleteTrade($lid_1,$lid_2){

            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "DELETE FROM TRADES WHERE first_lid = :lid_1 and sec_lid = :lid_2";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':lid_1',$lid_1, PDO::PARAM_INT);
            $stmt->bindParam(':lid_2', $lid_2, PDO::PARAM_INT);

            $isOk = $stmt->execute();

            $stmt = null;
            $pdo = null;
            return $isOk;
        }

    }//end of class