<?php
    require_once "common.php";

    $dao = new BookListingDAO();

     /*
     need to get email from session
     email must exist in the users table if not the listing will not be added
     
     */

//     $email = $_SESSION['user'];
//     email for testing purpose
    // $email = 'yomhanks@yahoo.com'; 


     $max = $dao->getMaxListingID();
     $l_id = $max + 1;
     var_dump($l_id);
     $status = True;
     $additional_images = 0;
     var_dump("THIS WORKS");

     // image uploading  
     //adapted from Prof Chris's foodgramgram image upload

     if ($_FILES['file']['name'][0] == '' && $_FILES['file']['name'][1] == ''){

     }else{

       var_dump($_FILES['file']);
       $uploadOk = 1;

       $target_dir = "../userAdded/";

       //  Check if uploaded images are identical
       if ($_FILES['file']['name'][0] === $_FILES['file']['name'][1]){
         $uploadOk = 0;
         $status = False;
       }

       for ($i = 0; $i < count($_FILES['file']['name']); $i++){
            if ($_FILES['file']['name'][$i] != ''){

              $additional_images += 1;
              // Check if image file is a actual image
              $check = getimagesize($_FILES["file"]["tmp_name"][$i]);
              if($check == false) {
                $uploadOk = 0;
                $status = False;
              }
              
              // Check file size
              if ($_FILES["file"]["size"][$i] > 2000000) {
                $uploadOk = 0;
                $status = False;
              }

              // Allow JPG only
              if($_FILES["file"]["type"][$i] !== "image/jpeg" && $_FILES["file"]["type"][$i] !== "image/png") {
                $uploadOk = 0;
                $status = False;
              }

            }
            
       }
       
     };
    //  end of image uploading

    // Check if $uploadOk is set to 0 by an error
    var_dump($uploadOk);
    if ($uploadOk === 1) {
      for ($i = 0; $i < count($_FILES['file']['name']); $i++){
        if ($_FILES['file']['name'][$i] != ''){
            move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_dir . $l_id . '-' . $i. '.jpg');

        }
  
      }
      echo "postive image is ok ";
    }
    elseif ($uploadOk === 0){
        // redirects back to add listing page with error 
        header("Location: ../createListing.html?error=true");
        echo "negative image is ok ";

    }

    if ($status){
          echo "listing added ";
          var_dump($additional_images);
           $title = $_POST["title"];
           var_dump($_POST);
           $isbn = $_POST['ISBN'];
           $description = $_POST["description"];
           $author = $_POST["author"];
           $genre = $_POST["genre"];
           $availability = 1;


           $listingOk = $dao->createListing($l_id, $email, $title, $isbn, $description, $author, $availability, $additional_images);

           $genreOk = $dao->addNewListGenre($l_id, $genre);
          

           var_dump($listingOk);
           var_dump($genreOk);

           if($listingOk && $genreOk)
           {
                  echo "Yes";
                  // header("Location: ../createListing.html?confirm");
           }
           else
           {
                  echo "No ";
                  echo 'this does not work';
           }

    }

    
    

?>