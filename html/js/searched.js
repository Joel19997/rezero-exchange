function ChangeDropDownBox (option){
    var selected_search_option = option;
    //alert(selected_search_option);
    document.getElementById("search_option_title").innerHTML = selected_search_option;
}
function get_searched_listings(){
    var searched = document.getElementById("user_input").value;
    var searched_option =  document.getElementById("search_option_title").innerText;
      //alert(searched_option);
      //alert(searched);

    if (searched_option == "Author")
    {
    //    obtain the list of books with the author's name
        const request = new XMLHttpRequest();
        console.log("Test1");
        request.onreadystatechange = function(){
                alert("meep");
                console.log(this.responseText);
                var books = this.responseText;
                for (const book of books){
                    var id = book.Lid;
                    var author = book.author;
                    var availability = book.availability;
                    var description = book.description;
                    var isbn = book.isbn;
                    var title = book.title;
                    if (availability === String(1) ){
                        createListings(isbn, author, title, id);
                    }
                
            }
        
        console.log("Test");
        request.open("GET", 'database/getListingByAuthor.php?author=' + searched, true);
        request.send();
        }
        // creating the cards based on the list
        // function createListings(isbn, author, title, id){
        //     var request = new XMLHttpRequest();
        //     request.onreadystatechange = function(){
        //         if (this.readyState == 4 && this.status == 200){
        //             var data = JSON.parse(this.responseText).items[0].volumeInfo;
        
        //             console.log(data)
        //             var image = data.imageLinks.thumbnail;
        //             // var zoomImage = image.replace('zoom=1', 'zoom=3')
        //             console.log(id)
        //             console.log(image)
        //             if (list_of_searched_books.includes(id)){
        //             var individualListing = document.createElement('div');
        //             individualListing.className = 'col-lg-4 col-sm-6 col-md-6 d-flex justify-content-center mb-3';
        //             individualListing.innerHTML = `<div class="card border-0" style="width: 70%; height: 450px">
        //                                                 <img src="${image}" class="card-img-top" style="height: 310px"  >
        //                                                 <div class="card-body">
        //                                                     <h5 class="card-title text-primary">${title}</h5>
        //                                                     <h6 class="card-subtitle mb-2 text-muted">${author}</h6>                                                
        //                                                 </div>
        //                                                 <div class="hover">
        //                                                     <a href="listing.php?listingID=${id}">
        //                                                     <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
        //                                                     </a>
        //                                                 </div>                    
        
        //                                             </div>`;
        //             allListings.appendChild(individualListing);
        //             }
                    
        //         }
        //     }
        //     request.open("GET", `https://www.googleapis.com/books/v1/volumes?q=isbn:${isbn}`, true);
        //     request.send();
        // }

    }
//     else if (searched_option=="Book"){
//          alert("is book");
//         // creating cards based on the list
//          function createListings(isbn, author, title, id){
//             var request = new XMLHttpRequest();
//             request.onreadystatechange = function(){
//                 if (this.readyState == 4 && this.status == 200){
//                     var data = JSON.parse(this.responseText).items[0].volumeInfo;
        
//                     console.log(data)
//                     var image = data.imageLinks.thumbnail;
//                     // var zoomImage = image.replace('zoom=1', 'zoom=3')
//                     console.log(id)
//                     console.log(image)
//                     if (list_of_searched_books.includes(id)){
//                     var individualListing = document.createElement('div');
//                     individualListing.className = 'col-lg-4 col-sm-6 col-md-6 d-flex justify-content-center mb-3';
//                     individualListing.innerHTML = `<div class="card border-0" style="width: 70%; height: 450px">
//                                                         <img src="${image}" class="card-img-top" style="height: 310px"  >
//                                                         <div class="card-body">
//                                                             <h5 class="card-title text-primary">${title}</h5>
//                                                             <h6 class="card-subtitle mb-2 text-muted">${author}</h6>                                                
//                                                         </div>
//                                                         <div class="hover">
//                                                             <a href="listing.php?listingID=${id}">
//                                                             <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
//                                                             </a>
//                                                         </div>                    
        
//                                                     </div>`;
//                     allListings.appendChild(individualListing);
//                     }
                    
//                 }
//             }
//             request.open("GET", `https://www.googleapis.com/books/v1/volumes?q=isbn:${isbn}`, true);
//             request.send();
//         }
//     }

//     else if (searched_option=="Genre"){
//         alert("is genre");

//         // creating cards based on the list
//         function createListings(isbn, author, title, id){
//             var request = new XMLHttpRequest();
//             request.onreadystatechange = function(){
//                 if (this.readyState == 4 && this.status == 200){
//                     var data = JSON.parse(this.responseText).items[0].volumeInfo;
        
//                     console.log(data)
//                     var image = data.imageLinks.thumbnail;
//                     // var zoomImage = image.replace('zoom=1', 'zoom=3')
//                     console.log(id)
//                     console.log(image)
//                     if (list_of_searched_books.includes(id)){
//                     var individualListing = document.createElement('div');
//                     individualListing.className = 'col-lg-4 col-sm-6 col-md-6 d-flex justify-content-center mb-3';
//                     individualListing.innerHTML = `<div class="card border-0" style="width: 70%; height: 450px">
//                                                         <img src="${image}" class="card-img-top" style="height: 310px"  >
//                                                         <div class="card-body">
//                                                             <h5 class="card-title text-primary">${title}</h5>
//                                                             <h6 class="card-subtitle mb-2 text-muted">${author}</h6>                                                
//                                                         </div>
//                                                         <div class="hover">
//                                                             <a href="listing.php?listingID=${id}">
//                                                             <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
//                                                             </a>
//                                                         </div>                    
        
//                                                     </div>`;
//                     allListings.appendChild(individualListing);
//                     }
                    
//                 }
//             }
//             request.open("GET", `https://www.googleapis.com/books/v1/volumes?q=isbn:${isbn}`, true);
//             request.send();
//         }
//    }

//    else if (searched_option=="User"){
//     alert("is User");

//     // creating cards based on the list
//     function createListings(isbn, author, title, id){
//         var request = new XMLHttpRequest();
//         request.onreadystatechange = function(){
//             if (this.readyState == 4 && this.status == 200){
//                 var data = JSON.parse(this.responseText).items[0].volumeInfo;
    
//                 console.log(data)
//                 var image = data.imageLinks.thumbnail;
//                 // var zoomImage = image.replace('zoom=1', 'zoom=3')
//                 console.log(id)
//                 console.log(image)
//                 if (list_of_searched_books.includes(id)){
//                 var individualListing = document.createElement('div');
//                 individualListing.className = 'col-lg-4 col-sm-6 col-md-6 d-flex justify-content-center mb-3';
//                 individualListing.innerHTML = `<div class="card border-0" style="width: 70%; height: 450px">
//                                                     <img src="${image}" class="card-img-top" style="height: 310px"  >
//                                                     <div class="card-body">
//                                                         <h5 class="card-title text-primary">${title}</h5>
//                                                         <h6 class="card-subtitle mb-2 text-muted">${author}</h6>                                                
//                                                     </div>
//                                                     <div class="hover">
//                                                         <a href="listing.php?listingID=${id}">
//                                                         <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
//                                                         </a>
//                                                     </div>                    
    
//                                                 </div>`;
//                 allListings.appendChild(individualListing);
//                 }
                
//             }
//         }
//         request.open("GET", `https://www.googleapis.com/books/v1/volumes?q=isbn:${isbn}`, true);
//         request.send();
//     }
// }

 }

