/*
	options with Multiple checkbox select with jQuery - May 27, 2013
	(c) 2013 @ElmahdiMahmoud
	license: https://www.opensource.org/licenses/mit-license.php
*/

$(".options dt a").on('click', function () {
    $(".options dd ul").slideToggle('fast');
});

$(".options dd ul li a").on('click', function () {
    $(".options dd ul").hide();
});

function getSelectedValue(id) {
    return $("#" + id).find("dt a span.value").html();
}

$(document).bind('click', function (e) {
    var $clicked = $(e.target);
    if (!$clicked.parents().hasClass("options")) $(".options dd ul").hide();
});

$('.mutliSelect input[type="checkbox"]').on('click', function () {

    var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
        title = $(this).val() + ",";

    if ($(this).is(':checked')) {
        var html = '<span title="' + title + '">' + title + '</span>';
        $('.multiSel').append(html);
        $(".hida").hide();
    } else {
        $('span[title="' + title + '"]').remove();
        var ret = $(".hida");
        $('.options dt a').append(ret);

    }
    if ($('.multiSel').is(':empty')) {
        $('.hida').show();
    }
});

