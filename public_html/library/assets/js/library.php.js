$(document).ready(()=>{
    
    $("#allocationSearchUserBtn").on("click",()=>{
        $("#allocationSearchUserView").removeClass("d-none");
        $("#allocationAfterSuccessView").addClass("d-none");
        $("#allocationSearchUserViewLoading").removeClass("d-none");
        var dataString = "type=getUser&user=" + $("#allocationSearchUserInput").val();
        console.log(dataString);
        $.ajax({
            type: "POST",
            url: "./includes/library.include.php",
            data: dataString,
            cache: false,
            success: function (outputData) {
                console.log(outputData);

                var output = $.parseJSON(outputData);
                if ($.trim(output[0]) == "ok") {

                    $("#allocationUserTable").hide();
                    var dataString = "type=getReservations&user=" + $("#allocationSearchUserInput").val();
                    $.ajax({
                        type: "POST",
                        url: "./includes/library.include.php",
                        data: dataString,
                        cache: false,
                        success: function (tabledata) {
                            if (tabledata.length != 0){
                                $("#allocationUserTable").show();
                                $('#allocationUserTable > tbody').html(tabledata);
                            }
                            
                        }
                    });

                    $("#allocationUserProfile").attr("src", $.trim(output[3]));
                    $("#allocationUserName").html($.trim(output[1]));
                    $("#allocationMobile").html($.trim(output[2]));
                    $("#allocationAfterSuccessView").removeClass("d-none");
                    $("#allocationSearchUserViewLoading").addClass("d-none");
                } else if ($.trim(output[0]) == "error") {
                    alert("ERROR - " + output[1]);
                    $("#allocationSearchUserView").addClass("d-none");
                    $("#allocationSearchUserInput").val("");
                    $("#allocationSearchUserInput").focus();
                }
            }
        });
    });

    $("#allocationSearchBookBtn").on("click",()=>{

        $("#bookSearchAllocateBtn").addClass("d-none");
        $("#bookSearchReservationQueueBtn").addClass("d-none");
        $("#allocationSearchBookView").removeClass("d-none");

        $("#afterBookLoadView").hide();
        $("#beforeBookLoadView").show();

        var dataString = "type=getBookDetails&book_id=" + $("#allocationBookSearchInput").val();
        $.ajax({
            type: "POST",
            url: "./includes/library.include.php",
            data: dataString,
            cache: false,
            success: function (outputData) {
                console.log(outputData);

                var output = $.parseJSON(outputData);
                if ($.trim(output[0]) == "ok") {

                    $("#allocationBookName").html($.trim(output[1]));
                    $("#allocationBookAuthor").html($.trim(output[2]));
                    $("#allocationBookPublication").html($.trim(output[3]));
                    $("#allocationBookAvailable").html($.trim(output[4]));
                    
                    if ($.trim(output[4]) == 0 ){
                        $("#bookSearchAllocateBtn").addClass("d-none");
                        $("#bookSearchReservationQueueBtn").removeClass("d-none");
                    }else{
                        $("#bookSearchReservationQueueBtn").addClass("d-none");
                        $("#bookSearchAllocateBtn").removeClass("d-none");
                    }

                    $("#afterBookLoadView").show();
                    $("#beforeBookLoadView").hide();

                } else if ($.trim(output[0]) == "error") {
                    alert("ERROR - " + output[1]);
                }
            }
        });
       
    });

});