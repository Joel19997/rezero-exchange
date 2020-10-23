<?php
    require_once "common.php";

    $dao  = new BookListingDAO();

    $result = $dao->getListingByAuthor("Laura Trentham");

    for($i = 0; $i < count($result); $i++)
    {
        echo $result[$i]->getTitle();
    }
?>