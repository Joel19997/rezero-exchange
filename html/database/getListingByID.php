<?php
    require_once "common.php";

    $l_id = $_GET['id'];

    $dao  = new BookListingDAO();

    $result = $dao->getListingByListingID(8);

    for($i = 0; $i < count($result); $i++)
    {
        echo json_encode(array(
        'Lid' => $result[$i]->getLid(),
        'isbn' => $result[$i]->getIsbn(),
        "title" => $result[$i]->getTitle(),
        'description' => $result[$i]->getDesc(),
        "availability" => $result[$i]->getAvailability(),
        'author' => $result[$i]->getAuthor()));
        
    }
?>