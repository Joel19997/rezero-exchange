function get_searched_listings(){
    const url = window.location.href;
    // Finding first occurance of '?' for parsing url
    var temp1 = url.indexOf("?"); 
    // only taking the parameters to search database
    all_params = url.substr(temp1+1); 
    all_params = all_params.split("user_input=");
     if (all_params[1] == ""){
         window.location.replace("http://localhost/216/ReZERO%20project/rezero-exchange/html/allListings.html");
     }
     else {
         document.getElementById("listings").innerHTML = all_params[1];
     }
}

