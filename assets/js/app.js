$(document).ready(function(){
    $(".goto").click(function () {
        let string = $(this).attr('data').split(',');
        let type = string[0];
        let uri = string[1];
        if (type == 0) {
            window.location = uri;
        } else if (type == 1) {
            window.open(uri, '_blank');
        }
    });
});