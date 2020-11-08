$(function(){
    $(".dropdown-item").click(function(){
        var icon_text=$(this).html();
        $(".dropdown-toggle").html(icon_text);
    })
})


function toggleSearch(){
    var x = document.getElementById("searchBar");
    if(x.style.display === "none")
    {
        x.style.display = "";
    }
    else
    {
        x.style.display = "none";
    }
}





// function verifyLogin(){
//     if(<%Session["email"] )

//     document.getElementById("signup").style.display = "none";
//     document.getElementById("login").style.display = "none";
// }