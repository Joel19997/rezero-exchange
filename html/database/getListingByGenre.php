<?php
    require_once "common.php";

    $dao = new BookListingDAO();
    $searching = $_GET["genre"];
    // get all possible listings
    $result = $dao->getListingByGenre($searching);
    //var_dump($result);
    $all_title = [];
    for ($n=0 ;$n < count($result);$n++){
        $results2 = $dao->getListingByListingID($result[$n]);
        //var_dump($results2);
         echo $results2[0]->getTitle();
        
         
         echo "</br>";
    }

?>