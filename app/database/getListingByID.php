<?php
    require_once "common.php";

    $l_id = $_GET['id'];
    $dao  = new BookListingDAO();
    $real_I_lid = "";
    $result = $dao->getListingByListingID($l_id);

    for($i = 0; $i < count($result); $i++)
    {
        echo json_encode(array(
        'Lid' => $result[$i]->getLid(),
        'email' => $result[$i]->getOwnerEmail(),    
        'isbn' => $result[$i]->getIsbn(),
        "title" => $result[$i]->getTitle(),
        'description' => $result[$i]->getDesc(),
        "availability" => $result[$i]->getAvailability(),
        'author' => $result[$i]->getAuthor(),
        'additional_images' => $result[$i]->getAdditionalImages()
    ));
        
    }

?>