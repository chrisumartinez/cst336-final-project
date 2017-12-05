function randomize(){
    //randomize index page:
    //get info for randomize:
    var url = "ajaxInfo.php";
    var type = "GET";
    var datatype = "html";
    
    var ajax;
    ajax = new XMLHttpRequest();
    ajax.open("GET", url, true);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        // alert(ajax.responseText);  //displays value retrieved from PHP program
        $("#frontPageBody").empty();
         var data = JSON.parse(ajax.responseText);
         var div = document.getElementById("frontPageBody");
         div.innerHTML += "Artist: " + data["name"] + "<br>";
         div.innerHTML += "Title: " + data["title"] + "<br>";
         div.innerHTML += "genre: "  + data["genre"];
       }
     }
}

function showAverage(){
    console.log("IN THE FUNCTION.");
    $('#average').toggle('show');
    $('#albums').hide();
    $('#awards').hide();
}
function showAlbums(){
    $('#average').hide();
    $('#albums').show();
    $('#awards').hide();
}
function showAwards(){
    $('#average').hide();
    $('#albums').hide();
    $('#awards').show();
}