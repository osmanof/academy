import {
    clickButtonHandler,
    courseButtonHandler,
    colorBlockButtonHandler,
    clickCloseButtonHandler,
    createCourseButtonHandler
} from "../handlers.js";

import {
    createCourseRequest
} from "./requests.js";


$(document).ready(function(){
    clickButtonHandler();
    clickCloseButtonHandler();
    courseButtonHandler();
    colorBlockButtonHandler();
    createCourseButtonHandler(function () {
        const colorNum = parseInt($(".color-circle.chosen").attr("class")[19]);
        const courseTitle = $('input[name="course_title"]').val();
        const accessibility = $('select[name="accessibility"]').val();

        createCourseRequest(colorNum, courseTitle, accessibility, function () {
            window.location.reload();
        });
    });
});



