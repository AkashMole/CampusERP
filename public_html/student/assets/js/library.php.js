$(document).ready(function(){

    $("#searchBooks").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#booksView .singleBook").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $(".singleBook").on("click", function(){
        $("#modalLoadingView").removeClass("d-none");
        $("#modalBookView").addClass("d-none");
        $(".BookViewModal").modal("show");

        var book_id = $(this).find(".bookid").text();
        
        var dataString = "type=getBookDetails&book_id=" + book_id ;
        $.ajax({
            type: "POST",
            url: "./includes/library.include.php",
            data: dataString,
            cache: false,
            success: function (outputData) {
                console.log(outputData);
                var output = $.parseJSON(outputData);
                if ($.trim(output["Result"]) == "ok") {

                    $(".modalBookTitle").html(output["name"]);
                    $("#modalBookAvailable").html(output["available"]);
                    $("#modalBookTotal").html(output["total"]);
                    $("#modalBookDescription").html(output["description"]);
                    $("#modalBookAuthor").html(output["author"]);
                    $("#modalBookPublication").html(output["publication"]);
                    $("#modalBookImage").attr("src", output["profile_path"]);
                    
                    $("#modalLoadingView").addClass("d-none");
                    $("#modalBookView").removeClass("d-none");
                } else if ($.trim(output[0]) == "error") {
                    alert("ERROR - " + output[1]);
                }
            }
        });

        
    });

});