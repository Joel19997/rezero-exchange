<?php
    require_once "common.php";

    $dao = new BookListingDAO();
    $searching = $_GET["owner_email"];

    $result = $dao->getListingByOwner($searching);
    $searched_books = [];
    for($i = 0; $i < count($result); $i++)
    {
        //$result[$i]->getTitle();
        $temp_Lid = $result[$i]->getLid();
        array_push($searched_books,$temp_Lid);
    }
    //var_dump($searched_books);    
    echo json_encode($searched_books);
?>