/* DELETE BUTTON TRIGGER*/
$(document).ready(function () {
    $(".delete-button").click(function () {
        var actionUrl = $(this).data("actionurl");
        $("#deleteForm").attr("action", actionUrl);
    });
});
/*END DELETE BUTTON TRIGGER*/

/*AUTO HIDE ALERT MESSAGES*/
    $(document).ready(function() {
    setTimeout(function () {
        $('.autoDismissAlert').addClass('fade-out');
        setTimeout(function () {
            $('.autoDismissAlert').remove();
        }, 1000); // Delay removal to match the fade-out transition duration
    }, 5000); // Delay before starting fade-out
});
/*END AUTO HIDE ALERT MESSAGES*/
