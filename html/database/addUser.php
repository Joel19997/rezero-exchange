<?php
    require_once "common.php";

    $dao = new UserDAO();

    $email = $_POST["email"];
    $lastName = $_POST["lastName"];
    $firstName = $_POST["firstName"];
    $password = md5($_POST["password"]);
    $contactNum = $_POST["contactNum"];
    $telegram = $_POST["telegram"];
    echo $email;

    $isOk = $dao->addUser($firstName, $lastName, $email, $password, $contactNum, $telegram);
    
    if($isOk)
    {
       $_SESSION["user"] = $email;
        header("Location: ../index.html");
    //     exit();
       //     echo "Yes";
    }
    else
    {
        header("Location: ../registerPage.html?error=true");
       //     echo "No";
    }
?>