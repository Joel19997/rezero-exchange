<?php
    require_once "common.php";

    $dao  = new BookListingDAO();
    $searching = $_GET["author"];
    //var_dump($searching);
    $result = $dao->getListingByAuthor($searching);
    for($i = 0; $i < count($result); $i++)
    {
        echo $result[$i]->getTitle();
    }
?>