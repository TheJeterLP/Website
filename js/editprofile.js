document.getElementById('edit-button').onclick = function () {
    dataArray = $('#edit-form').serializeArray();

    username = dataArray[0].value;
    password = dataArray[1].value;


    jQuery.ajax({
        type: "POST",
        url: '/functions/editprofile.php',
        dataType: 'json',
        data: {password: password, username: username},
        success: function (obj, textstatus) {
            if (!('error' in obj)) {
                yourVariable = obj.result;
                console.log(yourVariable);
                if (yourVariable) {
                    console.log("fading in true");
                    $("#edit-true").fadeIn().promise();
                    var delay = 5000;
                    setTimeout(function () {
                        window.location = '/';
                    }, delay);
                } else {
                    console.log("fading in false");
                    $("#edit-false").fadeIn().promise();
                }
            } else {
                $('#notification-false-text').text(obj.error);
                console.log("fading in false");
                $("#edit-false").fadeIn().promise();
                console.log(obj.error);
            }
        }
    });
};

document.getElementById('avatar-button').onclick = function () {
    var file_data = $('#inputfile').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);

    console.log(file_data);

    jQuery.ajax({
        type: "POST",
        url: '/functions/changeavatar.php',
        dataType: 'json',
        data: form_data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (obj, textstatus) {
            if (!('error' in obj)) {
                yourVariable = obj.result;
                console.log(yourVariable);
                if (yourVariable) {
                    console.log("fading in true");
                    $("#avatar-true").fadeIn().promise();
                    var delay = 5000;
                    setTimeout(function () {
                        window.location = '/';
                    }, delay);
                } else {
                    console.log("fading in false");
                    $("#avatar-false").fadeIn().promise();
                }
            } else {
                $('#notification-false-text').text(obj.error);
                console.log("fading in false 2");
                $("#avatar-false").fadeIn().promise();
                console.log(obj.error);
            }
        }
    });
};




