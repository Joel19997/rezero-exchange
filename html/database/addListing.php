<?php
    require_once "common.php";

    $dao = new BookListingDAO();

     /*
     need to get email from session
     email must exist in the users table if not the listing will not be added
     
     */

//     $email = $_SESSION['user'];
//  email for testing purpose
//     $email = 'yomhanks@yahoo.com'; 

     if (isset($_FILES["file"])){
       //adapted from Prof Chris's foodgramgram image upload
       $target_dir = "userAdded/";
       $uploadOk = 1;

       // Check if image file is a actual image
       $check = getimagesize($_FILES["file"]["tmp_name"]);
       if($check == false) {
         $uploadOk = 0;
       }  
       
       // Check file size
       if ($_FILES["file"]["size"] > 2000000) {
         $uploadOk = 0;
       }
       
       // Allow JPG only
       if($_FILES["file"]["type"] !== "image/jpeg") {
         $uploadOk = 0;
       }
       
       // Check if $uploadOk is set to 0 by an error
       if ($uploadOk === 1) {
         if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $fileID . '.jpg')) {
           header("Location: posts.html");
           exit();
         }
       }
       
     };

     $max = $dao->getMaxListingID();
     $l_id = $max + 1;
     var_dump($l_id);
     $title = $_POST["title"];
     var_dump($_POST);
     $isbn = $_POST['ISBN'];
     $description = $_POST["description"];
     $author = $_POST["author"];
     $genre = $_POST["genre"];
     $availability = 1;


     $listingOk = $dao->createListing($l_id, $email, $title, $isbn, $description, $author, $availability);

     $genreOk = $dao->addNewListGenre($l_id, $genre);
    

     var_dump($listingOk);
     var_dump($genreOk);

     if($listingOk && $genreOk)
     {
            echo "Yes";
     }
     else
     {
            echo "No ";
            echo 'this does not work';
     }
?>