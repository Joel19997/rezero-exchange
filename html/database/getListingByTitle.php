<?php

    require_once "common.php";

    $dao = new BookListingDAO();

    $result = $dao->getListingByTitle("Yours to keep");

    for($i = 0; $i < count($result); $i++)
    {
        echo $result[$i]->getOwnerEmail();
    }

?>