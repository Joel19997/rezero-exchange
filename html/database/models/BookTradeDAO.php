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


    }//end of class