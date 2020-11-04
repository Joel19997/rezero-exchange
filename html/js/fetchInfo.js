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
        url: '',
        titleValid: true,
        authorValid: true,
        descriptionValid: true,
        genreValid: true,
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
                        fill(title, authors, description, genre, image);
                        
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
        },
        validateForm: function(){
            if (this.title && this.author) {
                return true;
              }
        
              this.errors = [];
        
              if (!this.author) {
                this.errors.push('Author required.');
              }
              if (!this.title) {
                this.errors.push('Title required.');
              }
        
              event.preventDefault();
        }
    }
})