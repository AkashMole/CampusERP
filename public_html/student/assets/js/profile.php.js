$(document).ready(function () {

    $(document).on("click","#comm_details_update_btn", function(){
        var mobile_number = $("#mobile_number").val();
        var secondary_number = $("#s_number_input").val();
        var parents_number = $("#p_number_input").val();
        var email = $("#email_input").val();

        var add01 = $("#add_01_input").val();
        var add02 = $("#add_02_input").val();
        var city = $("#city_village_input").val();
        var pincode = $("#pincode_input").val();

        var dataString = "type=updateCommDetails&mobile_number=" + mobile_number + "&secondary_number=" + secondary_number + "&secondary_number=" + parents_number + "&parents_number=" + parents_number + "&email=" + email + "&add01=" + add01 + "&add02=" + add02 + "&city=" + city + "&pincode=" + pincode;

        console.log(dataString);

        $.ajax({
            type: "POST",
            url: "./includes/profile.include.php",
            data: dataString,
            cache: false,
            success: function (outputData) {
                console.log(outputData);
                var output = $.parseJSON(outputData);
                if ($.trim(output[0]) == "ok") {
                   alert("Data Updated Successfully");
                } else if ($.trim(output[0]) == "error") {
                    alert("ERROR - " + output[1]);
                }
            }
        });
    });

    $(document).on("click","#updatePasswordBtn", function(){
        var pwdUpdateConfirm = $("#pwdUpdateConfirm").val();
        var pwdUpdateOld = $("#pwdUpdateOld").val();
        var pwdUpdateNew = $("#pwdUpdateNew").val();

        if (pwdUpdateOld == pwdUpdateConfirm && pwdUpdateNew.length > 0){
            var dataString = "type=updatePassword&old=" + pwdUpdateOld + "&password=" + pwdUpdateNew;
            $.ajax({
                type: "POST",
                url: "./includes/profile.include.php",
                data: dataString,
                cache: false,
                success: function (outputData) {
                    console.log(outputData);
                    var output = $.parseJSON(outputData);
                    if ($.trim(output[0]) == "ok") {
                        var customurl = "./../bot.php?messagetype=passwordchange&username=Akash";
                        $.ajax({
                            type: "GET",
                            url: customurl,
                            data: dataString,
                            cache: false,
                            success: function (outputData) {
                                console.log(outputData);
                            }
                        });
                        alert("Password Updated Successfully");
                        window.location.href = "https://www.campuserp.xyz/student/login.php";
                    } else if ($.trim(output[0]) == "error") {
                        alert("ERROR - " + output[1]);
                    }
                }
            });
        }
        
    });

});
