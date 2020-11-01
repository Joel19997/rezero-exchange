// fetches the book information by making api calls


function getInfo(){
    event.preventDefault();
    var ISBN = document.getElementById('')
}

const vm = new Vue({
    el: '#search',
    data: {
        isbn : '',
        title: '',
        author: '',
        description: '',
        genre: '',
        showImage: false,
        url: ''
        

    },
    methods: {
        getInfo: function(){
            event.preventDefault();
            if (this.isbn === ''){
                this.title = '';
                this.description = '';
                this.genre = '';
                this.author = '';
                this.url = '';
                this.showImage = false;
    
                
            }else{
                var ISBN = this.isbn;
                var fill = this.fillInfo;
                var request = new XMLHttpRequest();
                request.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200){
                        var data = JSON.parse(this.responseText).items[0].volumeInfo;

                        console.log(data)
                        var title = data.title;
                        var authors = data.authors;
                        var description = data.description;
                        var genre = data.categories;
                        var image = data.imageLinks.thumbnail;
                        // console.log(title);
                        // console.log(authors)
                        // console.log(description);
                        // console.log(genre);
                        // var zoomImage = image.replace('zoom=1', 'zoom=3')
                        fill(title, authors, description, genre, image);
                        // this.title = title;
                        // this.description = description;
                        
                    }
                }
                request.open("GET", `https://www.googleapis.com/books/v1/volumes?q=isbn:${ISBN}`, true);
                request.send();
            }
        },
        fillInfo: function(title, authors, description, genre, image){
            this.title = title;
            this.description = description;
            this.genre = genre;
            this.author = authors;
            this.url = image;
            this.showImage = true;
        }
    }
})