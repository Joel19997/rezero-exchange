console.log(id);

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
request.open("GET", `database/getListingByID.php?id=${id}`, true);
request.send();


function createListing(isbn, author, title, id){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            var data = JSON.parse(this.responseText).items[0].volumeInfo;

            var image = data.imageLinks.thumbnail;
            // var zoomImage = image.replace('zoom=1', 'zoom=3')
            console.log(image)
            var individualListing = document.createElement('div');

            
        }
    }
    request.open("GET", `https://www.googleapis.com/books/v1/volumes?q=isbn:${isbn}`, true);
    request.send();
}