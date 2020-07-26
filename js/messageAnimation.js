// 1: show it only once through the session
// >1 : show it as long as page redirects (may have more features in the future)
function msgAnimate(alternative = null) {
    var message = $("#message > div").html();
    if (message != '') {
        $("#message").slideDown("fast", function() {
            setTimeout(function() {
            $("#message").slideUp("fast");
            }, 3000);
        });
    } else if(alternative != null && alternative !='') {
        $("#message > div").html(alternative);
        $("#message").slideDown("fast", function() {
            setTimeout(function() {
            $("#message").slideUp("fast");
            }, 3000);
        });
    }
}
msgAnimate();

