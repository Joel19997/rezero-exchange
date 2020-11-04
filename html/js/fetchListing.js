console.log('id at the top is',id);

const left = document.getElementById('left');
const right = document.getElementById('right');

var request = new XMLHttpRequest();
request.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
        var listing = JSON.parse(this.responseText);
        console.log(listing);

        var id = listing.Lid;
        var email = listing.email;
        var author = listing.author;
        var availability = listing.availability;
        var description = listing.description;
        var isbn = listing.isbn;
        var title = listing.title;
        createListing(isbn, author, description, title, email);


        
    }
}
console.log('id at the bottom is ', id);
request.open("GET", `database/getListingByID.php?id=${id}`, true);
request.send();


function createListing(isbn, author, description, title, email){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            var data = JSON.parse(this.responseText).items[0].volumeInfo;

            var image = data.imageLinks.thumbnail;
            console.log(image)
            // left.innerHTML = `<img src='${image}' style="width: 45%; height: 85%" class='pl-5'> 
            left.innerHTML = `<img src='${image}' class='pl-2 w-50 mx-auto'> 
                                <div class='container mt-3'> 
                                    <h1 class='display-4'>${title} <h1>
                                    <h3>by ${author}</h3>
                                 </div>`;
             
            right.innerHTML = `<h2 class='text-center mb-1'><u>Synopsis</u></h2>
            <h4 class='mt-1'>${description}</h4>`;
            fetchUserInfo(email);
        }
    }
    request.open("GET", `https://www.googleapis.com/books/v1/volumes?q=isbn:${isbn}`, true);
    request.send();
}


function fetchUserInfo(email){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
        var listing = JSON.parse(this.responseText);

        var lastName = listing.lastName;
        var firstName = listing.firstName;
        var telegram = listing.telegram;
        var email = listing.email;

        var profile = document.createElement('div');
        profile.className = 'container';
        profile.innerHTML = `<h5 class='mt-5'>
                                <strong><u>Owner Details:</u></strong><br>
                                ${lastName} ${firstName}<br>
                                Email: ${email}<br>
                                Telegram Handle: ${telegram}
                            </h5>
                            <a href="./listingsForTrade.html" role="button"><button type="button" class="btn btn-primary mt-5">Request Trade</button></a>
                            `;
        
        console.log(listing)

        right.appendChild(profile);


        
    }
}
request.open("GET", `database/getUserByEmail.php?email=${email}`, true);
request.send()
};