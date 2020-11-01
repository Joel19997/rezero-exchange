function get_searched_listings(){
    const url = window.location.href;
    // Finding first occurance of '?' for parsing url
    var temp1 = url.indexOf("?"); 
    // only taking the parameters to search database
    all_params = url.substr(temp1+1); 
    all_params = all_params.split("user_input=");
     if (all_params[1] == ""){
        window.location.replace("http://localhost/216/ReZERO%20project/rezero-exchange/html/allListings.html");
     }
     else {
        author_searched = all_params[1];
        new_searched = "";
        const test = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890"
        for (i=0;i < author_searched.length ; i++){
            if (test.includes(author_searched[i])){
                new_searched += author_searched[i];
            }
            else {
                new_searched += " ";
            }
        }
        document.getElementById("listings").innerHTML = new_searched;
        // Need to add if-else function to see which catergory the user wants to search by
        // this is search by author
        getListingByAuthor(new_searched);

     }
}
function getListingByAuthor(new_searched){
    var request = new XMLHttpRequest();
request.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
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
request.open("GET", 'database/getListingByAuthor.php?author=' + new_searched, true);
request.send();
}