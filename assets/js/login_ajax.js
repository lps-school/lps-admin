/**
 * Created by Amit on 2/26/2016.
 */

$(document).ready(function () {
    //alert('fha');
    $('#error_msg').hide();
    $('#loader').hide();

    $("#submit").click(function () {
        //alert('fha');
        $('#loader').show();
        var password = $("#password").val();
        var email = $("#email").val();
        // Returns successful data submission message when the entered information is stored in database.
        if (password == '' || email == '' ) {
            $('#loader').hide();
            //$('#search_error_msg').show();
            alert('All Fields Are Required');
        } else {
            //var dataString = 'title=' + keyword + '&NMLSCode=' + NMLSCode;
            //alert(dataString);
            $.ajax({
                type: "POST",
                datatype: 'json',
                url: "<?php base_url(); ?>login/ajax_login",
                data: {
                    email: $("input#email").val(),
                    password: $("input#password").val()
                },
                error: function () {
                    alert("An error occoured!");
                },
                success: function (result) {
                    //if(result == 'success')
                    $('#loader').hide();
                    //$("#success_msg").show();
                    $('#user_result').html(result);

                }
            });
        }
        //AJAX code to submit form.
        return false;
    });
});