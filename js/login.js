grecaptcha.ready(function () {
    // do request for recaptcha token
    // response is promise with passed token
    grecaptcha.execute('6Lf2BHQaAAAAAP1v0qqNX2vHZhUp6_BQ7h9fSY4x', {action: 'create_comment'}).then(function (token) {
        // add token to form
        $(".login-form").prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
    });
});

document.getElementById('login-button').onclick = function () {
    dataArray = $('#login-form').serializeArray();

    token = dataArray[0].value;
    email = dataArray[1].value;
    password = dataArray[2].value;
    
    console.log(dataArray);

    jQuery.ajax({
        type: "POST",
        url: '/functions/login.php',
        dataType: 'json',
        data: {password: password, email: email, token: token},
        success: function (obj, textstatus) {
            console.log(obj);
            if (!('error' in obj)) {
                yourVariable = obj.result;
                console.log(yourVariable);
                if (yourVariable) {
                    console.log("fading in true");
                    $("#login-true").fadeIn().promise();
                    var delay = 5000;
                    setTimeout(function () {
                        window.location = '/';
                    }, delay);
                } else {
                    console.log("fading in false");
                    $("#login-false").fadeIn().promise();
                }
            } else {
                $('#notification-false-text').text(obj.error);
                console.log("fading in false");
                $("#login-false").fadeIn().promise();
                console.log(obj.error);
            }
        }
    });
};




