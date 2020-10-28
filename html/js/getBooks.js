

const allListings = document.getElementById('listings');


var request = new XMLHttpRequest();
request.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
        var books = JSON.parse(this.responseText).listing;
        console.log(books);
        for (book of books){
            var id = book.lid;
            var author = book.author;
            var availability = book.availability;
            var description = book.description;
            var isbn = book.isbn;
            var title = book.title;
            // var image = getImage(isbn);

            if (availability === String(1) ){
                console.log(title);
                var individualListing = document.createElement('div');
                individualListing.className = 'col-4 mx-auto';
                individualListing.innerHTML = `<div class="card" style="width: 18rem;">
                                                    <img src="" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-primary">${title}</h5>
                                                        <h6 class="card-subtitle mb-2 text-muted">${author}</h6>                                                
                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                    </div>
                                                </div>`;
                allListings.appendChild(individualListing);

            };

        }
        
    }
}
request.open("GET", 'database/getAllListings.php', true);
request.send();


// function getImage(isbn){
//     var request = new XMLHttpRequest();
//     request.onreadystatechange = function(){
//         if (this.readyState == 4 && this.status == 200){
//             var data = JSON.parse(this.responseText).items[0].volumeInfo;

//             console.log(data)
//             var title = data.title;
//             var authors = data.authors;
//             var description = data.description;
//             var genre = data.categories;
//             var image = data.imageLinks.thumbnail;
//             // console.log(title);
//             // console.log(authors)
//             // console.log(description);
//             // console.log(genre);
//             var zoomImage = image.replace('zoom=1', 'zoom=3')
//             fill(title, authors, description, genre, zoomImage);
//             // this.title = title;
//             // this.description = description;
            
//         }
//     }
//     request.open("GET", `https://www.googleapis.com/books/v1/volumes?q=isbn:${isbn}`, true);
//     request.send();
// }