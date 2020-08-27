$(document).on("click", "#checkLogin", function () {

    $("#checkLogin").prop("disabled", true);
    var email = $("#inputEmail").val();
    var password = $("#inputPassword").val();
    var dataString = "type=checkLogin&email=" + email + "&password=" + password;
    console.log(dataString);
    $.ajax({
        type: "POST",
        url: "./includes/auth.include.php",
        data: dataString,
        cache: false,
        success: function (outputData) {
            console.log(outputData);
            var output = $.parseJSON(outputData);
            if ($.trim(output[0]) == "ok") {
                window.location.href = "./dashboard.php";
            } else if ($.trim(output[0]) == "userpass") {
                alert("Check your accoutn status or credential and try again.");
                $("#checkLogin").prop("disabled", false);
            } else if ($.trim(output[0]) == "error") {
                alert(result[1]);
            }
        }
    });

});