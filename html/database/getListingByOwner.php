<?php
    require_once "common.php";

    $dao = new BookListingDAO();

    $result = $dao->getListingByOwner("linkinpakr@gmail.com");

    for($i = 0; $i < count($result); $i++)
    {
        echo $result[$i]->getTitle();
    }

?>