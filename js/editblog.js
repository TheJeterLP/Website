document.getElementById('edit-button').onclick = function () {
    dataArray = $('#edit-form').serializeArray();

    id = dataArray[0].value;
    title = dataArray[1].value;
    text = dataArray[2].value;
    
    jQuery.ajax({
        type: "POST",
        url: '/functions/editblogpost.php',
        dataType: 'json',
        data: {text: text, title: title, id: id},
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




