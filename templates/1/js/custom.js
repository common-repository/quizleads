function loop() {
    jQuery(".question-reveiw").hide(), jQuery("#question-reveiw" + count).fadeIn(), count += 1
}
var count = 2,
    total_questions;
jQuery(document).ready(function($) {
    $("#question-0").fadeIn(), $(".yes_btn").click(function() {
        var e = parseInt($(this).attr("rel")),
            t = e + 1;
        if ($(this).addClass("active"), $("#question-" + e).hide(), total_questions = $(this).attr("total"), total_questions == e) {
            if ($("#review-questions").fadeIn(), $("#review-questions").addClass("active"), $("#review-questions").hasClass("active")) {
                $("#question-reveiw1").fadeIn();
                for (var i = 0; total_questions >= i; i++) {
                    var n = i + 1;
                    setTimeout(function() {
                        loop()
                    }, 2e3 * n)
                }
                var s = parseInt(total_questions) + 2;
                setTimeout(function() {
                    $(".theme01__content").hide(), $("#review-content").fadeIn()
                }, 2e3 * s)
            }
        } else $("#question-" + t).fadeIn()
    }), $(".no_btn").click(function() {
        var e = parseInt($(this).attr("rel")),
            t = e + 1;
        $(this).addClass("active"), $("#question-" + e).hide();
        var i = $(this).attr("total");
        if (i == e) {
            if ($("#review-questions").fadeIn(), $("#review-questions").addClass("active"), $("#review-questions").hasClass("active")) {
                $("#question-reveiw1").fadeIn();
                for (var n = 0; i >= n; n++) {
                    var s = n + 1;
                    setTimeout(function() {
                        loop()
                    }, 2e3 * s)
                }
                var o = parseInt(i) + 2;
                setTimeout(function() {
                    $(".theme01__content").hide(), $("#review-content").fadeIn()
                }, 2e3 * o)
            }
        } else $("#question-" + t).fadeIn()
    })
});