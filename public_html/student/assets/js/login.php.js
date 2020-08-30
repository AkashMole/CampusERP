$(document).on("click", "#checkLogin", function () {

    $("#checkLogin").prop("disabled", true);
    var email = $("#inputEmail").val();
    var password = $("#inputPassword").val();
    var dataString = "type=checkLogin&email=" + email + "&password=" + password;
    $.ajax({
        type: "POST",
        url: "./includes/auth.include.php",
        data: dataString,
        cache: false,
        success: function (outputData) {
            console.log(outputData);
            var output = $.parseJSON(outputData);
            if ($.trim(output[0]) == "ok") {
                user = "username=" + $("#inputEmail").val();
                var browser = getBrowser();
                $.ajax({
                    type: "GET",
                    url: "./../bot.php?messagetype=newlogin&username=" + email + "&image=" + output[1] + "&browser=" + browser + "&type=student",
                    dataString: user,
                    cache: false,
                    success: function (outputData) {
                        console.log(outputData);
                    }
                });
                window.location.href = "./dashboard.php";
            } else if ($.trim(output[0]) == "userpass") {
                alert("Check your accoutn status or credential and try again.");
                $("#checkLogin").prop("disabled", false);
            } else if ($.trim(output[0]) == "error") {
                alert(output[1]);
            }
        }
    });

});


function getBrowser(){
    if ((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1) {
        return 'Opera';
    }
    else if (navigator.userAgent.indexOf("Chrome") != -1) {
        return 'Chromium Based';
    }
    else if (navigator.userAgent.indexOf("Safari") != -1) {
        return 'Safari';
    }
    else if (navigator.userAgent.indexOf("Firefox") != -1) {
        return 'Firefox';
    }
    else if ((navigator.userAgent.indexOf("MSIE") != -1) || (!!document.documentMode == true)) //IF IE > 10
    {
        return 'IE';
    }
    else {
        return 'unknown';
    }
}