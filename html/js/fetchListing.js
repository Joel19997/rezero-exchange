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
        var additionalImages = listing.additional_images;
        createListing(isbn, author, description, title, email, additionalImages, id);


        
    }
}
console.log('id at the bottom is ', id);
request.open("GET", `database/getListingByID.php?id=${id}`, true);
request.send();


function createListing(isbn, author, description, title, email, additional_images, id){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            var data = JSON.parse(this.responseText).items[0].volumeInfo;

            var image = data.imageLinks.thumbnail;
            console.log(image)
            // left.innerHTML = `<img src='${image}' style="width: 45%; height: 85%" class='pl-5'> 
            
            if (additional_images == 1){
                left.innerHTML = `<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    </ol>
                                    <div class="carousel-inner" >
                                    <div class="carousel-item active">
                                        <img class="d-block w-50 mx-auto" src="${image}" >
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-75 mx-auto" src="../html/userAdded/${id}-0.jpg" >
                                    </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <div class='container mt-3 '> 
                                    <h1 class='display-4'>${title} <h1>
                                    <h3>by ${author}</h3>
                                </div>`;                

            }else if(additional_images == 2){
                left.innerHTML = `<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-50 mx-auto" src="${image}" >
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-50 mx-auto" src="../html/userAdded/${id}-0.jpg" >
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-50 mx-auto" src="../html/userAdded/${id}-1.jpg" >
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <div class='container mt-3'> 
                                    <h1 class='display-4'>${title} <h1>
                                    <h3>by ${author}</h3>
                                </div>`;                

            }else{
                left.innerHTML = `<img src='${image}' class='pl-2 w-50 mx-auto'> 
                <div class='container mt-3'> 
                    <h1 class='display-4'>${title} <h1>
                    <h3>by ${author}</h3>
                 </div>`;

            }


            if (description.length < 300){
                right.innerHTML = `<h2 class='text-center mb-1'><u>Synopsis</u></h2>
                <h4 class='mt-1'>${description}</h4>
                `;
            }else{
                right.innerHTML = `<h2 class='text-center mb-1'><u>Synopsis</u></h2>
                <h4 class='mt-1'>${description.slice(0,250)}<span id='dots'>...</span><span id="more" class='d-none'>${description.slice(250,description.length)}</span></h4>
                <button type="button" class="btn btn-primary mt-1" onclick="getMore()" id='moreButton'>Read More</button>`;    
            }
            fetchUserInfo(email);
        }
    }
    request.open("GET", `https://www.googleapis.com/books/v1/volumes?q=isbn:${isbn}`, true);
    request.send();
}

function getMore(){
    event.preventDefault();
    var more = document.getElementById('more');
    var dots = document.getElementById('dots');
    var button = document.getElementById('moreButton')
    if (more.className == 'd-none'){
        more.className = 'd-inline';
        dots.className = 'd-none';
        button.innerText = 'Read Less'
    }else{
        more.className = 'd-none';
        dots.className = 'd-inline';
        button.innerText = 'Read More'

    }
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