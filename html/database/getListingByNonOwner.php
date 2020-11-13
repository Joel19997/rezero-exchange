<?php
    require_once "common.php";

    $dao = new BookListingDAO();
    $searching = $_GET["owner_email"];

    $result = $dao-> getNotMyListings($searching);

    $listings = array("listings" => array());


    foreach($result as $book)
    {
        $listings["listing"][] = array(
            'Lid' => $book->getLid(),
            'isbn' => $book->getIsbn(),
            "title" => $book->getTitle(),
            'description' => $book->getDesc(),
            "availability" => $book->getAvailability(),
            'author' => $book->getAuthor()

        );
    }


    echo json_encode($listings);
?>