<?php
    require_once "common.php";

    $email = $_GET['email'];

    $dao = new UserDAO();

    $result = $dao->selectUser($email);


    // for($i = 0; $i < count($result); $i++)
    // {
        echo json_encode(array(
        'firstName' => $result->getFirstName(),
        'lastName' => $result->getLastName(),
        'contactNum' => $result->getContactNum(),
        "email" => $result->getEmail(),
        'telegram' => $result->getTelegram()));
        
    // }



?>