import {
    clickButtonHandler,
    classButtonHandler,
    clickCloseButtonHandler,
    clickCreateThemaButtonHandler
} from "../handlers.js";

import {
    createThemaRequest
} from "./requests.js";



$(document).ready(function(){
    clickButtonHandler();
    clickCloseButtonHandler();
    classButtonHandler();
    clickCreateThemaButtonHandler(function () {
        const title = $('input[name="thema_title"]').val();
        const deadline_date = $('input[name="deadline_date"]').val();
        const deadline_time = $('input[name="deadline_time"]').val();
        const thema_type = $('select[name="thema_type"]').val();

        console.log(title, deadline_date, deadline_time, thema_type);
        createThemaRequest(title, deadline_date, deadline_time, thema_type, function (response) {
            if (response == 200) {
                window.location.reload();
            }
        })
    });
});



