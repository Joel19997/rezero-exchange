function ChangeDropDownBox (option){
    var selected_search_option = option;
    //alert(selected_search_option);
    document.getElementById("search_option_title").innerHTML = selected_search_option;
}
function get_searched_listings(){
    var searched = document.getElementById("user_input").value;
    var searched_option =  document.getElementById("search_option_title").innerText;
    //  alert(searched_option);
    //  alert(searched);

    if (searched_option == "Author"){
       // alert("is authoer");
        function getListingByAuthor(searched){
            var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                //alert("mepp");
                var books = this.responseText;
                alert(books);
                for (const book of books){
                    var id = book.Lid;
                    var author = book.author;
                    var availability = book.availability;
                    var description = book.description;
                    var isbn = book.isbn;
                    var title = book.title;
                    if (availability === String(1) ){
                        createListings(isbn, author, title, id);
                    };
                }
            }
        }
        request.open("GET", 'database/getListingByAuthor.php?author=' + searched, true);
        request.send();
        }
    }
    else if (searched_option=="Book"){
         alert("is book");
    }

    else if (searched_option=="Genre"){
        alert("is genre");
   }

   else if (searched_option=="User"){
    alert("is User");
}

}

