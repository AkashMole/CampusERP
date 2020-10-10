$(document).ready(function () {

    $(".singleQuestion").removeClass("d-none");
    $("#submitButtonView").removeClass("d-none");

    $("#submitExamBtn").on("click", ()=>{

        $("#submitButtonView").addClass("d-none");
        $(".singleQuestion").addClass("d-none");
        $("#calculationView").removeClass("d-none");

        $(window).unbind('beforeunload');
        //window.location.href = "./dashboard.php";
    });

    document.addEventListener('contextmenu', event => event.preventDefault());

    $(document).on('contextmenu', (event)=>{
        event.preventDefault();
        $(".RefreshModal").modal('show');
    });

});

$(window).bind('beforeunload', function () {
    return "";
});




$(document).ready(function() {

    //Initial Setup
    document.addEventListener('contextmenu', event => event.preventDefault());
    var interval;
    $("#examRow").hide();
    $(".loader").hide();
    var Browser = null,
        start_time = null,
        end_time = null,
        totalMarks = 0;
    checkBrowser();

    //End Submit
    $(document).on("click", "#endSubmit", function() {
        clearInterval(interval);
        $(".timerRow").html("Exam Ended Successfully");
        end_time = moment().format('YYYY-MM-D h:mm:ss');

        $("#endSubmit").hide();
        $("#examRow").slideUp(1000).delay(1000);
        sendAlert("Exam Submit", "Submitting Exam To Server", "blue", 6000);
        $(".loader").show();

        var questionCount = $(".questionAnswer").length;
        for (var i = 1; i <= questionCount; i++) {
            var data = $('input[name="option' + i + '"]:checked').val();
            var ans = $('input[name="answer' + i + '"]').val();
            var mark = parseInt($('input[name="mark' + i + '"]').val());
            if (data == ans) {
                totalMarks = totalMarks + mark;
            }
        }

        var dataString = "type=submitExam&marks=" + totalMarks + "&start_time=" + start_time + "&end_time=" + end_time + "&exam_id=<?php echo $exam_id; ?>&student_id=<?php echo $student_id; ?>";
        console.log(dataString);
        $.ajax({
            type: "POST",
            url: "./includes/submitExam.inc.php",
            data: dataString,
            cache: false,
            success: function(statusVar) {
                console.log(statusVar);
                var result = $.parseJSON(statusVar);
                if ($.trim(result[0]) == "ok") {
                    sendAlert("Success", "Exam Result Submitted", "blue", 5000);
                    setTimeout(function() {
                        $(".loader").html("<h5>You have Scored - " + totalMarks + " Mark/s</h5>");
                    }, 5000);
                } else if ($.trim(result[0]) == "exists") {
                    sendAlert("Warning", "Exam Submitted Previously.", "red", 5000);
                    setTimeout(function() {
                        $(".loader").html("Error! Exam Submitted Previously....");
                    }, 5000);
                } else if ($.trim(result[0]) == "error") {
                    sendAlert("SQL Error", result[1], "red", 5000);
                }
            }
        });
    });

    //Start Exam
    function startExam() {
        $(".loader").fadeIn(1000).delay(2500);
        setTimeout(function() {
            $(".loader").hide();
            $("#examRow").show();
            startTimer();
            start_time = moment().format('YYYY-MM-D h:mm:ss');
        }, 5000);
    }

    //Alert funciton
    function sendAlert(Title, Msg, Color, Timeout) {
        iziToast.show({
            title: Title,
            color: Color,
            timeout: Timeout,
            theme: 'light',
            message: Msg
        });
    }

    //Check Browser
    function checkBrowser() {

        var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);

        Browser = "Other";
        if (isChrome)
            Browser = "Google Chrome";

        if (Browser == "Other") {
            $("#browser").text(" Your Browser is not Chromium Based. Please Change your browser to continue. ");
            $("#browser").addClass("text-danger");
            $("#startSubmit").hide();

        } else {
            $("#browser").text(" Your Browser is Chromium Based. You can start Exam.");
            $("#browser").addClass("text-success");
        }
    }

    //Timer Function
    function startTimer() {
        var minutes;
        var timer2 = $(".timer").html();
        interval = setInterval(function() {
            var timer = timer2.split(':');
            //by parsing integer, I avoid all extra string processing
            minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);
            --seconds;
            minutes = (seconds < 0) ? --minutes : minutes;
            if (minutes < 0) {
                $("#endSubmit").trigger("click");
            } else {
                if (minutes == 20 && seconds == 0) {
                    sendAlert("Alert", "20 Minutes Remaining", "red", 10000);
                }
                if (minutes == 10 && seconds == 0) {
                    sendAlert("Alert", "10 Minutes Remaining", "red", 10000);
                }
                if (minutes == 5 && seconds == 0) {
                    sendAlert("Alert", "Last 5 Minutes Remaining", "red", 15000);
                }
                if (minutes == 1 && seconds == 0) {
                    sendAlert("Alert", "Last 1 Minute Remaining", "red", 20000);
                }
            }
            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;
            //minutes = (minutes < 10) ?  minutes : minutes;
            $('.timer').html(minutes + ':' + seconds);
            timer2 = minutes + ':' + seconds;
        }, 1000);
    }
});
