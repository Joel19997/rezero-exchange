<?php

    require_once "common.php";

    $dao = new BookListingDAO();
    //$searching = $_GET["owner_email"];

    $result = $dao->getListingByTitle("Yours to keep");

    for($i = 0; $i < count($result); $i++)
    {
        echo $result[$i]->getOwnerEmail();
        echo "</br>";

    }

?>