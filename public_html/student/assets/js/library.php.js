$(document).ready(function(){

    $("#searchBooks").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#booksView .singleBook").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

});