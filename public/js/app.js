$(document).ready(function() {
    footerToBottom();
    $(window).resize(function() {
        footerToBottom();
    })


});

function footerToBottom() {
    var browserHeight = $(window).height(),
        footerOuterHeight = $('#footer').outerHeight(true),
        mainHeightMarginPaddingBorder = $('#main').outerHeight(true) - $('#main').height() + 3;
    $('#main').css({
        'min-height': browserHeight - footerOuterHeight - mainHeightMarginPaddingBorder,
    });
};