function randomize(){
    //randomize index page:
    //get info for randomize:
    var url = "ajaxInfo.php";
    var type = "GET";
    var datatype = "html";
    
    // //use ajax call with jquery;
    // $.ajax(
    //     type: type,
    //     url: url,
    //     success: function(){
    //         //finsh randomize function here:
            
            
    //     })
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