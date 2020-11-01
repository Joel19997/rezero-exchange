console.log('id at the top is',id);

const left = document.getElementById('left');
const right = document.getElementById('right');

var request = new XMLHttpRequest();
request.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
        var listing = JSON.parse(this.responseText);
        console.log(listing);

        var id = listing.Lid;
        var author = listing.author;
        var availability = listing.availability;
        var description = listing.description;
        var isbn = listing.isbn;
        var title = listing.title;
        createListing(isbn, author, description, title);


        
    }
}
console.log('id at the bottom is ', id);
request.open("GET", `database/getListingByID.php?id=${id}`, true);
request.send();


function createListing(isbn, author, description, title){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            var data = JSON.parse(this.responseText).items[0].volumeInfo;

            var image = data.imageLinks.thumbnail;
            console.log(image)
            // left.innerHTML = `<img src='${image}' style="width: 45%; height: 85%" class='pl-5'> 
            left.innerHTML = `<img src='${image}' class='pl-5 w-50'> 
                                <div class='container mt-3'> 
                                    <h1 class='display-4'>${title} <h1>
                                    <h3>by ${author}</h3>
                                 </div>`;
            right.innerHTML = `<h3 class='mt-3'>${description}</h3>
                                <button type="button" class="btn btn-primary mt-5">Request Trade</button>
                                `;
        }
    }
    request.open("GET", `https://www.googleapis.com/books/v1/volumes?q=isbn:${isbn}`, true);
    request.send();
}