<?php
    require_once "common.php";

    $dao  = new BookListingDAO();

    $result = $dao->getAllBookListing();

    $arrBooks = [];

    $listings = array("listings" => array());


    foreach($result as $book)
    {
        $listings["listing"][] = array(
            "title" => $book->getTitle(),
            "availability" => $book->getAvailability(),
        );
    }


    echo json_encode($listings);

?>