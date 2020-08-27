$(document).ready(function () {

    $(document).on("click","#comm_details_update_btn", function(){
        var mobile_number = $("#mobile_number").val();
        var secondary_number = $("#s_number_input").val();
        var parents_number = $("#p_number_input").val();
        var emial = $("#email_input").val();

        var add01 = $("#add_01_input").val();
        var add02 = $("#add_02_input").val();
        var city = $("#city_village_input").val();
        var pincode = $("#pincode_input").val();

        var dataString = "type=updateCommDetails&email=" + email + "&password=" + password;
        $.ajax({
            type: "POST",
            url: "./includes/profile.include.php",
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

});
