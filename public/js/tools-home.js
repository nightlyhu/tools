$(function () {
    $("#yourScreenRes").html(screen.width + "x" + screen.height);
    $("#yourPlatform").html(navigator.platform);

    $("#timeDay").html(moment().format('dddd'));
    $("#timeClock").html(moment().format('MMMM Do YYYY, h:mm:ss a'));
    $("#timeWeek").html(moment().week());
    $("#timeZone").html(Intl.DateTimeFormat().resolvedOptions().timeZone);
});
