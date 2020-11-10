<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="testHome2.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
        <style>
            .swiper-slide {
                height: auto;
                }
        </style>



    </head>
    <body class="body1">
        <header class="header1">
            <a href="testHome2.html" class="logo">Re-Zero</a>
            <ul>
                <li><a href="testHome2.html">Home</a></li>
                <li><a href="allListings.html">Books</a></li>
                <li><a href="#">About</a></li>
                <li class="login"><a href="loginPage.html" >Log In</a></li>
            </ul>
            
        </header>
    
        <div class="overlay-listing d-flex justify-content-center  pb-5" >
            <div class='container-fluid row pt-5 pb-5' >
                <div class="col-lg-5 text-center container-fluid " id='left'>
                    <div class="swiper-container" style="cursor: pointer">
                        <div class="swiper-wrapper" id='swiper'>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- Add Pagination -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <!-- <div id='title'></div>  -->
                </div>
                <div class="col-lg-7 text-center mt-3 " id='right'>
                </div>
            </div>
        </div>

        <?php
            $listing = $_GET['listingID'];
        ?>
        <script> var id = "<?=$listing ?>";  </script>
        <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
        <script src='js/fetchListing.js'></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    

    </body>
</html>