<?php
    class BookListingDAO{


        function getAllListingGenre()  #Works tgt with getAllBookListing()
        {
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "select * from BOOK_GENRE";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $results = [];
            while ($row = $stmt->fetch()){
                $l_id = $row['l_id'];
                $genre = $row['genre'];
                $results[] = [$l_id, $genre];
            }
            $pdo = null;
            $stmt = null;
            return $results;
        }

        function getListingGenre($l_id)
        {
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "select * from BOOK_GENRE WHERE l_id = :l_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":l_id", $l_id, PDO::PARAM_STR);
            $stmt->execute();
            $results = [];
            while ($row = $stmt->fetch()){
                $l_id = $row['l_id'];
                $genre = $row['genre'];
                $results[] = [$l_id, $genre];
            }
            $pdo = null;
            $stmt = null;
            return $results;
        }



        function getAllBookListing()  #Works with getAllListingGenre()
        {
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "select * from book_listing";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $results = [];
            while ($row = $stmt->fetch()){
                $l_id = $row['l_id'];
                $ownerEmail = $row['owner_email'];
                $isbn = $row['isbn'];
                $bookTitle = $row['book_title'];  
                $itemDesc = $row['item_desc'];  
                $availability = $row['availability'];    
                $author = $row['author'];
                
                $user = new BookListing($l_id, $ownerEmail, $bookTitle, $isbn, '' , $itemDesc, $availability, $author);
                $results[] = $user;
            }
            $pdo = null;
            $stmt = null;
            return $results;
        }

        function getFinalAllBookListing()
        {
            $bookList = $this->getAllBookListing();
            $bookGenre = $this->getAllListingGenre();

            for($i = 0; $i < count($bookGenre); $i++)
            {
                for($z = 0; $z < count($bookList); $z ++)
                {
                    if($bookList[$z]->getLid() == $bookGenre[$i][0])
                    {
                        $genre = $bookList[$z]->getGenre();
                        if($genre != "")
                        {
                            $bookList[$z]->setGenre($genre . ", " . $bookGenre[$i][1]);
                        }
                        else
                        {
                            $bookList[$z]->setGenre($bookGenre[$i][1]);
                        }
                    }
                }
            }

            return $bookList;

        }

        function getListingByAuthor($author)
        {
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "select * from book_listing where author = :author";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":author", $author, PDO::PARAM_STR);
            $stmt->execute();
            $results = [];
            while ($row = $stmt->fetch()){
                $l_id = $row['l_id'];
                $ownerEmail = $row['owner_email'];
                $isbn = $row['isbn'];
                $bookTitle = $row['book_title'];  
                $itemDesc = $row['item_desc'];  
                $availability = $row['availability'];     

                
                $book = new BookListing($l_id, $ownerEmail, $bookTitle, $isbn, '' , $itemDesc, $availability, $author);
                $results[] = $book;


                for($z = 0; $z < count($results); $z++)
                {
                    $genre = $this->getListingGenre($results[$z]->getLid());
                    if($results[$z]->getGenre() == "")
                    {
                        $results[$z]->setGenre($genre);
                    }
                    else
                    {
                        $currGenre = $results[$z]->getGenre();
                        $results[$z]->setGenre($currGenre . ", " . $genre);
                    }
                }

            }
            $pdo = null;
            $stmt = null;
            return $results;
        }
        

        function getListingByOwner($email)
        {
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "select * from book_listing where owner_email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
            $results = [];
            while ($row = $stmt->fetch()){
                $l_id = $row['l_id'];
                $ownerEmail = $row['owner_email'];
                $isbn = $row['isbn'];
                $bookTitle = $row['book_title'];  
                $itemDesc = $row['item_desc'];  
                $availability = $row['availability'];
                $author = $row['author'];
       
                
                $book = new BookListing($l_id, $ownerEmail, $bookTitle, $isbn, '' , $itemDesc, $availability, $author);
                $results[] = $book;


                for($z = 0; $z < count($results); $z++)
                {
                    $genre = $this->getListingGenre($results[$z]->getLid());
                    if($results[$z]->getGenre() == "")
                    {
                        $results[$z]->setGenre($genre);
                    }
                    else
                    {
                        $currGenre = $results[$z]->getGenre();
                        $results[$z]->setGenre($currGenre . ", " . $genre);  #Bug not fixed yet but codes works, YOLO
                    }
                }

            }
            $pdo = null;
            $stmt = null;
            return $results;
        }


        function getListingByTitle($title)
        {
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "select * from book_listing where book_title = :title";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":title", $title, PDO::PARAM_STR);
            $stmt->execute();
            $results = [];
            while ($row = $stmt->fetch()){
                $l_id = $row['l_id'];
                $ownerEmail = $row['owner_email'];
                $isbn = $row['isbn'];
                $bookTitle = $row['book_title'];  
                $itemDesc = $row['item_desc'];  
                $availability = $row['availability'];    
                $author = $row['author'];
   
                
                $book = new BookListing($l_id, $ownerEmail, $bookTitle, $isbn, '' , $itemDesc, $availability, $author);
                $results[] = $book;


                for($z = 0; $z < count($results); $z++)
                {
                    $genre = $this->getListingGenre($results[$z]->getLid());
                    if($results[$z]->getGenre() == "")
                    {
                        $results[$z]->setGenre($genre);
                    }
                    else
                    {
                        $currGenre = $results[$z]->getGenre();
                        $results[$z]->setGenre($currGenre . ", " . $genre);  #Bug not fixed yet but codes works, YOLO
                    }
                }

            }
            $pdo = null;
            $stmt = null;
            return $results;
        }

        function getListingByIsbn($isbn)
        {
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "select * from book_listing where isbn = :isbn";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":isbn", $isbn, PDO::PARAM_STR);
            $stmt->execute();
            $results = [];
            while ($row = $stmt->fetch()){
                $l_id = $row['l_id'];
                $ownerEmail = $row['owner_email'];
                $isbn = $row['isbn'];
                $bookTitle = $row['book_title'];  
                $itemDesc = $row['item_desc'];  
                $availability = $row['availability']; 
                $author = $row['author'];

                      
                
                $book = new BookListing($l_id, $ownerEmail, $bookTitle, $isbn, '' , $itemDesc, $availability, $author);
                $results[] = $book;


                for($z = 0; $z < count($results); $z++)
                {
                    $genre = $this->getListingGenre($results[$z]->getLid());
                    if($results[$z]->getGenre() == "")
                    {
                        $results[$z]->setGenre($genre);
                    }
                    else
                    {
                        $currGenre = $results[$z]->getGenre();
                        $results[$z]->setGenre($currGenre . ", " . $genre);  #Bug not fixed yet but codes works, YOLO
                    }
                }

            }
            $pdo = null;
            $stmt = null;
            return $results;
        }

        function getListingByListingID($l_id)
        {
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "select * from book_listing where l_id = :l_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":l_id", $l_id, PDO::PARAM_STR);
            $stmt->execute();
            $results = [];
            while ($row = $stmt->fetch()){
                $l_id = $row['l_id'];
                $ownerEmail = $row['owner_email'];
                $isbn = $row['isbn'];
                $bookTitle = $row['book_title'];  
                $itemDesc = $row['item_desc'];  
                $author = $row['author'];
                $availability = $row['availability'];       
                
                $book = new BookListing($l_id, $ownerEmail, $bookTitle, $isbn, '' , $itemDesc, $availability, $author);
                $results[] = $book;


                for($z = 0; $z < count($results); $z++)
                {
                    $genre = $this->getListingGenre($results[$z]->getLid());
                    if($results[$z]->getGenre() == "")
                    {
                        $results[$z]->setGenre($genre);
                    }
                    else
                    {
                        $currGenre = $results[$z]->getGenre();
                        $results[$z]->setGenre($currGenre . ", " . $genre);  #Bug not fixed yet but codes works, YOLO
                    }
                }

            }
            $pdo = null;
            $stmt = null;
            return $results;
        }


        function getMyListings($email)
        {
            $avail = 1;
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "select * from BOOK_LISTING WHERE owner_email = :email AND availability = :availability";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":availability", $avail, PDO::PARAM_INT);
            $stmt->execute();
            $results = [];
            while ($row = $stmt->fetch()){
                $l_id = $row['l_id'];
                $ownerEmail = $row['owner_email'];
                $isbn = $row['isbn'];
                $bookTitle = $row['book_title'];  
                $itemDesc = $row['item_desc'];  
                $availability = $row['availability'];   
                $author = $row['author'];    
                
                $book = new BookListing($l_id, $ownerEmail, $bookTitle, $isbn, '' , $itemDesc, $availability, $author);
                $results[] = $book;
            }
            $pdo = null;
            $stmt = null;
            return $results;

        }
        
        function getL_id($email,$isbn)//Get last value of entry of that session ID and ISBN, add into db
        {
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "SELECT * FROM BOOK_LISTING WHERE isbn = :isbn AND owner_email = :owner_email ORDER by l_id DESC LIMIT 1";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':isbn', $isbn, PDO::PARAM_STR);
            $stmt->bindParam(':owner_email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);


            $row = $stmt->fetch();
            $l_id = $row['l_id'];

            $pdo = null;
            $stmt = null;
            return $l_id;

        }

        function addNewListGenre($l_id,$genre){

            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "INSERT into BOOK_GENRE (l_id,genre) VALUES (:l_id,:genre)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':l_id', $l_id, PDO::PARAM_STR);
            $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
            $stmt->execute();
            $isOk = FALSE;
            $stmt = null;
            $pdo = null;
            return $isOk;
        }

        function updateAvailability($email,$status)//1 = available, 2 = Pending, 3 = rejected
        {
            $connManager = new ConnectionManager();
            $pdo = $connManager->getConnection();
            $sql = "Update book_listing SET availability = :status WHERE owner_email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            // STEP 4 - Is this cat found in cat table?
            $stmt->execute();

            // STEP 3 - Run Query
            $isOk = FALSE;

            // STEP 4
            $stmt = null;
            $pdo = null;

            // STEP 5
            return $isOk;
        }

     }//end of class




?>
