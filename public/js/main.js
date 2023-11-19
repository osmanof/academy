import "./jquery/jquery.js";


$(".choose-role__button.teacher").click(function () {
    window.location.href = "teacher/register";
});

$(".choose-role__button.student").click(function () {
    window.location.href = "student/register";
});

$(".login__button").click(function () {
    window.location.href = "login";
});

