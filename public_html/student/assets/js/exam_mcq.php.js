$(document).ready(function () {

    function checkBrowser() {

        var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);

        Browser = "Other";
        if (isChrome)
            Browser = "Google Chrome";
        if (Browser == "Other") {
            $("#browser").text(" Your Browser is not Chromium Based. Please Change your browser to continue. ");
            $("#browser").addClass("text-danger");
            $("#startSubmit").hide();
            $("#startExamBtn").hide();
        } else {
            $("#browser").text(" Your Browser is Chromium Based. You can start Exam.");
            $("#browser").addClass("text-success");
            $("#startExamBtn").show();
        }
    }

    $("#startExamModalBtn").on("click", function (e) {
        
        var exam_id = $(e.target).closest('.examRow').find(".examid").html();
        $("#examModalExamID").html(exam_id);
        var exam_name = $(e.target).closest('.examRow').find(".examname").html();
        $("#examModalExamName").html(exam_name);
        var exam_duration = $(e.target).closest('.examRow').find(".examduration").html();
        $("#examModalExamDuration").html(exam_duration);
        var exam_marks = $(e.target).closest('.examRow').find(".exammarks").html();
        $("#examModalExamMarks").html(exam_marks);

        checkBrowser();

        $(".startExamModal").modal("show");
    });

    $("#startExamBtn").on("click", function (e) {

        var dataString = "type=setMCQExamSession&exam_id=" + $("#examModalExamID").html();
        $.ajax({
            type: "POST",
            url: "./includes/exam.include.php",
            data: dataString,
            cache: false,
            success: function (outputData) {
                console.log(outputData);
                if (outputData == "OK") {
                    var windowObjectReference;
                    var strWindowFeatures = 'channelmode="yes",location="no",menubar="no",status="yes",fullscreen="yes"';
                    windowObjectReference = window.open("./exam_mcq_view.php", "CNN_WindowName", strWindowFeatures);
                    windowObjectReference.moveTo(0, 0);
                    windowObjectReference.resizeTo(screen.width, screen.height);
                } else if (outputData == "error") {
                    alert("ERROR");
                }
            }
        });

        

    });

});