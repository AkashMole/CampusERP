$(document).ready(function () {

    $("#oldBooksViewBtn").on("click", function (e) {
        $(".oldBooksViewModel").modal("show");
    });

    $("#myBooksViewBtn").on("click", function () {
        $(".myBooksViewModel").modal("show");
    });

    $(".bookMoreDetailsBtn").on("click", function (e) {
        $(".BookViewModal").modal("show");
        $("#modalLoadingView").removeClass("d-none");
        $("#modalBookView").addClass("d-none");
        var book_id = $(e.target).closest('.bookRow').find(".bookid").html();
        var dataString = "type=getBookDetails&book_id=" + book_id;
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