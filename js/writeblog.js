document.getElementById('write-button').onclick = function () {
    dataArray = $('#write-form').serializeArray();

    title = dataArray[0].value;
    text = dataArray[1].value;
    
    console.log(dataArray);
    
    jQuery.ajax({
        type: "POST",
        url: '/functions/writeblogpost.php',
        dataType: 'json',
        data: {text: text, title: title},
        success: function (obj, textstatus) {
            if (!('error' in obj)) {
                yourVariable = obj.result;
                console.log(yourVariable);
                if (yourVariable) {
                    console.log("fading in true");
                    $("#write-true").fadeIn().promise();
                    var delay = 5000;
                    setTimeout(function () {
                        window.location = '/blog';
                    }, delay);
                } else {
                    console.log("fading in false");
                    $("#write-false").fadeIn().promise();
                }
            } else {
                $('#notification-false-text').text(obj.error);
                console.log("fading in false");
                $("#write-false").fadeIn().promise();
                console.log(obj.error);
            }
        }
    });
};




