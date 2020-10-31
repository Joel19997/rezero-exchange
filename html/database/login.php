<?php
    require_once "common.php";
    var_dump($_POST['email']);
    var_dump($_POST['password']);
    
    $dao = new UserDAO();
    
    //$username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $allEntries = $dao->retrieveAll();
    // var_dump($allEntries);
    // email: coffebean@hotmail.com  password: mlpodsaj21B
    $user = $dao->selectUser($email);
    var_dump($user);
    $hashed = $user->getPassword();
    var_dump($hashed);
    $status = password_verify($password, $hashed); // return true if user entered password matches database hashed pw
    if ($status){
        session_start();
        $_SESSION["user"] = $email;
        header("Location: ../testHome2.html");
    }
    else{
        session_start();
        $_SESSION["error"] = "Failed login";
        header("Location: ../loginPage.html");
    }
    
    //$passwordCorrect = $dao->login($username);
    // $loginStatus=0;
    // if ($passwordCorrect==NULL)
    // {
    //     $loginStatus = 0;
    // }
    // else
    // {
    //     $hashed_pw = md5($password);
    //     //echo ($hashed_pw);
    //     //echo(' ');
    //     if ($hashed_pw == $passwordCorrect)#success login, start session
    //         {
                
    //             $loginStatus=1;
                
    //             $_SESSION['username'] = $username;
    //             //echo('this'+$_SESSION['username']);  
                
    //         }
    //         else{
    //              $loginStatus=2;
    //         }
    // }
    // echo($loginStatus);
    
?>