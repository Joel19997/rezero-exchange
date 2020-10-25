


var request = new XMLHttpRequest();
request.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
        var data = JSON.parse(this.responseText);
        console.log(data);
        
    }
}
request.open("GET", 'database/getAllListings.php', true);
request.send();
