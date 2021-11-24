document.getElementById('delete-button').onclick = function () {
    dataArray = $('#delete-form').serializeArray();

    id = dataArray[0].value;
    
    jQuery.ajax({
        type: "POST",
        url: '/functions/deletepost.php',
        dataType: 'json',
        data: {id: id},
        success: function (obj, textstatus) {
            if (!('error' in obj)) {
                yourVariable = obj.result;
                console.log(yourVariable);
                if (yourVariable) {
                    console.log("fading in true");
                    $("#delete-true").fadeIn().promise();
                    var delay = 5000;
                    setTimeout(function () {
                        window.location = '/blog';
                    }, delay);
                } else {
                    console.log("fading in false");
                    $("#delete-false").fadeIn().promise();
                }
            } else {
                $('#notification-false-text').text(obj.error);
                console.log("fading in false");
                $("#delete-false").fadeIn().promise();
                console.log(obj.error);
            }
        }
    });
};




