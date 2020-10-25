<?php
    require_once "common.php";
    //var_dump($_POST['username']);
    //var_dump($_POST['password']);
    
    $dao = new UserDAO();
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    
    $passwordCorrect = $dao->login($username);
    $loginStatus=0;
    if ($passwordCorrect==NULL)
    {
        $loginStatus = 0;
    }
    else
    {
        $hashed_pw = md5($password);
        //echo ($hashed_pw);
        //echo(' ');
        if ($hashed_pw == $passwordCorrect)#success login, start session
            {
                
                $loginStatus=1;
                
                $_SESSION['username'] = $username;
                //echo('this'+$_SESSION['username']);  
                
            }
            else{
                 $loginStatus=2;
            }
    }
    echo($loginStatus);
    
?>