function ChangeDropDownBox (option){
    var selected_search_option = option;
    document.getElementById("search_option_title").innerHTML = selected_search_option;
}
const allListings1 = document.getElementById('listings1');
 
function get_searched_listings_by_enter(event){
    if (event.keyCode === 13) {
        get_searched_listings();
    }
}
function get_searched_listings(){
    var searched = document.getElementById("user_input").value;
    var searched_option =  document.getElementById("search_option_title").innerText;
    if (searched_option == "Author")
    {
        allListings1.innerText = "";
    const request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200){
            var data = JSON.parse(request.responseText);
        }
        if (data != undefined){
            for (s=0; s< data.length;s++){
                const request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                    if (request.readyState == 4 && request.status == 200){
                        // console.log(data[s]);
                        // console.log(request.responseText);
                        var listing_data = JSON.parse(request.responseText);
                        var isbn = listing_data.isbn;
                        var author = listing_data.author; 
                        var title = listing_data.title; 
                        var id = listing_data.Lid; 
                        if (listing_data.availability == 1){
                        createListings(isbn, author, title, id)
                        }
                    }
                }
                request.open("GET", `database/getListingByID.php?id=${data[s]}`, true);
                request.send();
            }
        }
}
    request.open("GET", `database/getListingByAuthor.php?author=${searched}`, true);
    request.send();
    }
    else if (searched_option=="Book"){
        allListings1.innerText = "";
        const request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200){
            var data = JSON.parse(request.responseText);
            }
            if (data != undefined){
                for (s=0; s < data.length;s++){
                    const request = new XMLHttpRequest();
                    request.onreadystatechange = function() {
                        if (request.readyState == 4 && request.status == 200){
                            var listing_data = JSON.parse(request.responseText);
                            console.log(listing_data);
                            var isbn = listing_data.isbn;
                            var author = listing_data.author; 
                            var title = listing_data.title; 
                            var id = listing_data.Lid; 
                            if (listing_data.availability == 1){
                            createListings(isbn, author, title, id)
                            }
                        }
                    }
                    request.open("GET", `database/getListingByID.php?id=${data[s]}`, true);
                    request.send();
                }
            }
    }
    request.open("GET", `database/getListingByTitle.php?book_title=${searched}`, true);
    request.send();
    }
    else if (searched_option=="Genre"){
        //alert("is genre");
        allListings1.innerText = "";
        //alert(searched_option);
        //alert(searched);
        const request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200){
            var data = JSON.parse(request.responseText);
            //console.log(data);
            }
            if (data != undefined){
                for (s=0; s < data.length;s++){
                    const request = new XMLHttpRequest();
                    request.onreadystatechange = function() {
                        if (request.readyState == 4 && request.status == 200){
                            var listing_data = JSON.parse(request.responseText);
                            //console.log(listing_data);
                            var isbn = listing_data.isbn;
                            var author = listing_data.author; 
                            var title = listing_data.title; 
                            var id = listing_data.Lid; 
                            if (listing_data.availability == 1){
                            createListings(isbn, author, title, id)
                            }
                        }
                    }
                    request.open("GET", `database/getListingByID.php?id=${data[s]}`, true);
                    request.send();
                }
            }
    }
    request.open("GET", `database/getListingByGenre.php?genre=${searched}`, true);
    request.send();

   }
   else if (searched_option=="User"){
    allListings1.innerText = "";
    const request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200){
        var data = JSON.parse(request.responseText);
        //console.log(data);
        }
        if (data != undefined){
            for (s=0; s < data.length;s++){
                const request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                    if (request.readyState == 4 && request.status == 200){
                        var listing_data = JSON.parse(request.responseText);
                        //console.log(listing_data);
                        var isbn = listing_data.isbn;
                        var author = listing_data.author; 
                        var title = listing_data.title; 
                        var id = listing_data.Lid; 
                        if (listing_data.availability == 1){
                        createListings(isbn, author, title, id)
                        }
                    }
                }
                request.open("GET", `database/getListingByID.php?id=${data[s]}`, true);
                request.send();
            }
        }
}
request.open("GET", `database/getListingByOwner.php?owner_email=${searched}`, true);
request.send();
}

 }

 function createListings(isbn, author, title, id){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            var data2 = JSON.parse(this.responseText).items[0].volumeInfo;
            var image = data2.imageLinks.thumbnail;
            var individualListing = document.createElement('div');
            individualListing.className = 'col-lg-4 col-sm-6 col-md-6 d-flex justify-content-center mb-3';
            individualListing.innerHTML = `<div class="card border-0" style="width: 70%; height: 450px">
                                                <img src="${image}" class="card-img-top" style="height: 310px"  >
                                                <div class="card-body">
                                                    <h5 class="card-title text-primary">${title}</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">${author}</h6>                                                
                                                </div>
                                                <div class="hover">
                                                    <a href="listing.php?listingID=${id}">
                                                    <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                                    </a>
                                                </div>                    

                                            </div>`;
            allListings1.appendChild(individualListing);   
        }
    }
    request.open("GET", `https://www.googleapis.com/books/v1/volumes?q=isbn:${isbn}`, true);
    request.send();
}