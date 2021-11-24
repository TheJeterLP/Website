grecaptcha.ready(function () {
    // do request for recaptcha token
    // response is promise with passed token
    grecaptcha.execute('6Lf2BHQaAAAAAP1v0qqNX2vHZhUp6_BQ7h9fSY4x', {action: 'create_comment'}).then(function (token) {
        // add token to form
        $(".register-form").prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
    });
});

document.getElementById('register-button').onclick = function () {
    dataArray = $('#register-form').serializeArray();

    token = dataArray[0].value;
    username = dataArray[1].value;
    email = dataArray[2].value;
    passwordfirst = dataArray[3].value;
    passwordsecond = dataArray[4].value;

    jQuery.ajax({
        type: "POST",
        url: '/functions/register.php',
        dataType: 'json',
        data: {passwordfirst: passwordfirst, passwordsecond: passwordsecond, email: email, username: username, token: token},
        success: function (obj, textstatus) {
            console.log(obj);
            if (!('error' in obj)) {
                yourVariable = obj.result;
                console.log(yourVariable);
                if (yourVariable) {
                    $("#register-true").fadeIn().promise();
                    var delay = 5000;
                    setTimeout(function () {
                        window.location = '/user/login';
                    }, delay);
                } else {
                    $("#register-false").fadeIn().promise();
                }
            } else {
                $('#notification-false-text').text(obj.error);
                $("#register-false").fadeIn().promise();
            }
        }
    });
};
