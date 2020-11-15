<?php
    require_once "common.php";
    // var_dump($_POST['email']);
    // var_dump($_POST['password']);
    
    $dao = new UserDAO();
    $email = $_POST['email'];
    $password = $_POST['password'];

    // $allEntries = $dao->retrieveAll();
    // var_dump($allEntries);
    // email: coffebean@hotmail.com  password: mlpodsaj21B
    $status = false;
    $user = $dao->selectUser($email);
    var_dump($user);
    if($user != "")
    {
        $hashed = $user->getPassword();
        $testHash = md5($password);
        $status = $testHash == $hashed;
    }
        
    if ($status){
        
        $_SESSION["user"] = $email;
        header("Location: ../index.html");
    }
    else{
        
        $_SESSION["error"] = "You have entered the wrong email and/ password";
        //var_dump($_SESSION); 
        header("Location: ../loginPage.html");
    }
   

    
    
    
?>