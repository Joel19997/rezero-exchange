function ChangeDropDownBox(option) {
    var selected_search_option = option;
    document.getElementById("search_option_title").innerHTML = selected_search_option;
}

function search(){
    alert(selected_search_option);
}