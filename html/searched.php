<?php
    session_start();
    // if ( isset($_POST['drop_down_input']) || isset($_POST['user_input'])) {
    //   // collect value of input field
    //   // $drop_down_input = $_POST['drop_down_input'];
    //   // $user_input = $_POST['user_input'];  
    //   var_dump("not from url");
    // }
    // else {
    //   var_dump("from url");
    // }
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="testHome2.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

    </head>
    <body class="body1" >
        <header class="header1">
            <a href="testHome.html" class="logo">Re-Zero</a>
            <ul>
                <li><a href="testHome.html">Home</a></li>
                <li><a href="searched.php">Books</a></li>
                <li><a href="#">About</a></li>
            <?php 
              //Displays different buttons depending on user session status (whether user is logged in or not)
              if ( !isset($_SESSION["user"]) ) {
                echo "
                <li class='login'><a href='loginPage.html'>Log In</a></li>
                ";
              }
              else{
                echo "
                <li><a href='database/profile.html'>Profile</a></li>
                <li class='login'><a href='logout.php'>Log Out</a></li>
                ";
              }
            ?>
            </ul>
            
        </header>
    
        <div class="overlay" >
            <div class='container-fluid row mx-auto pt-5 pb-5' id='listings'>
                <!-- Start of search bar -->
                <div class="col-md-10">
                    <div class="input-group md-form">
                        <button class="btn btn-outline-secondary dropdown-toggle btn-sm" id="search_option_title" type="button" data-toggle="dropdown" style='padding: 3px 5px;'>Search by</button>
                        <div class="dropdown-menu" id= "drop_down_input" name="drop_down_input">
                          <a class="dropdown-item" id="book" value="book" onclick="ChangeDropDownBox('Book')">Title</a>
                          <a class="dropdown-item" id="author" value="author" onclick="ChangeDropDownBox('Author')">Author</a>
                          <a class="dropdown-item" id="genre" value="genre" onclick="ChangeDropDownBox('Genre')">Genre</a>
                          <a class="dropdown-item" id="user" value="user" onclick="ChangeDropDownBox('User')">User</a>
                        </div>
                      <input class="form-control my-0 py-1 amber-border" type="text" name="user_input" id="user_input" placeholder="Search on Re-Zero!" aria-label="Search" onkeyup="get_searched_listings_by_enter(event)">
                            <button type="submit" id="searched" href="searched.html" class="btn btn-primary col-md-2" onclick="get_searched_listings()" >
                            <img src="images/search_icon.png" style="height: 20px;"></button>
                    </div>
                  </div>
                  <!-- start of new search bar -->
                   <!-- SearchBar -->
              <section id="searchBar" class="search-bar">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-10 mx-auto">
                      <form action="searched.html" method="POST">
                        <div class="p-1 bg-light shadow-sm">
                          <div class="input-group">
                            <input type="search" id="user_input" placeholder="Search based on title, genre, author" class="form-control border-0 bg-light">
                            <div class="input-group-append">
                              <!-- Button -->
                              <div class="btn-group">
                                <button type="button" id="search_option_title" class="btn btn-secondary dropdown-toggle smallscreen" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Title
                                </button>
                                <div class="dropdown-menu">
                                  <option class="dropdown-item" id="book" name="book" onclick="ChangeDropDownBox('Title')" selected>Title</option>
                                  <option class="dropdown-item" id="author" name="author" onclick="ChangeDropDownBox('Author')">Author</option>
                                  <option class="dropdown-item" id="genre" name="genre" onclick="ChangeDropDownBox('Genre')">Genre</option>
                                  <option class="dropdown-item" id="user" name="user" onclick="ChangeDropDownBox('User')">User</option>
                                </div>
                              </div>
                              <div class="input-group-append">
                                <button type="submit" class="btn btn-link"><a class="searchIcon"></a></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </section>
            


                  <!-- end of search bar -->
                    <div class='container-fluid row mx-auto pt-5 pb-5' id='listings1'>     
                    </div>
            </div>
        </div>
        <script type="text/javascript">
        window.addEventListener("scroll", function(){
            var header= document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
        </script>
        <script> var user_input = "<?=$user_input?>";</script>
        <script src="../html/js/searched.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    </body>
</html>