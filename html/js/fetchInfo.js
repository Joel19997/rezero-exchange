// fetches the book information by making api calls



const vm = new Vue({
    el: '#search',
    data: {
        isbn : '',
        title: '',
        author: '',
        description: '',
        genre: '',
        showImage: false,
        url: '',
        isbnError: false,
        isbnInvalid: false,
        titleError: false,
        authorError: false,
        descriptionError: false,
        genreError: false,
        errors: [],
        

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
                this.showImage = false
                
            }else{
                var ISBN = this.isbn;
                var fill = this.fillInfo;
                var invalid = this.invalidISBN;
                var request = new XMLHttpRequest();
                request.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200){
                        console.log(JSON.parse(this.responseText).totalItems)
                        var output = JSON.parse(this.responseText).totalItems;
                        if (output === 0){
                            invalid();
                        }else{
                            var data = JSON.parse(this.responseText).items[0].volumeInfo;
                            console.log(data)
                            var title = data.title;
                            var authors = data.authors;
                            var description = data.description;
                            var genre = data.categories;
                            var image = data.imageLinks.thumbnail;
                            fill(title, authors, description, genre, image);
                            
                        }
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

            this.authorError = false;
            this.isbnError = false;
            this.titleError = false;
            this.genreError = false;
            this.descriptionError = false;
            this.isbnInvalid = false;

        },
        validateForm: function(){

              if (!this.author) {
                this.authorError = true;
              }
              if (!this.isbn) {
                this.isbnError = true;
              }
              if (!this.title) {
                this.titleError = true;
              }
              if (!this.genre) {
                this.genreError = true;
              }
              if (!this.description) {
                this.descriptionError = true;
              }
              event.preventDefault();
        }, 
        invalidISBN: function(){
            this.isbnInvalid = true;
            this.title = '';
            this.description = '';
            this.genre = '';
            this.author = '';
            this.url = '';
            this.showImage = false
        }
    }
})