<?php
    require_once "common.php";


    $dao = new UserDAO();

    $resultArr = $dao->retrieveAll();


    $result = array("users" => array());

    foreach($resultArr as $user)
    {
        $result["user"][] = array(
            // "uid" => $user->getUid(),
            "firstName" => $user->getFirstName(),
            "lastName" => $user->getLastName(),
            "password" => $user->getPassword(),
            "contactNum" => $user->getContactNum(),
            "email" => $user->getEmail()
        );
    }


    echo json_encode($result);

?>