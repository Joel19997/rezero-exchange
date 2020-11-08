<?php
    require_once "common.php";

    $dao = new UserDAO();
    $userEmail = $_POST['email'];
    $resultArr = $dao->selectUser($userEmail);
    $my_arr = [];
    $result = array("user" => array());
    foreach($resultArr as $user)
    {
        $result["user"][] = array(
            "firstName" => $user->getFirstName(),
            "lastName" => $user->getLastName(),
            "contactNum" => $user->getContactNum(),
            "email" => $user->getEmail()
        );
    }


    echo json_encode($result);
    

?>