import {
    editor
} from "./code.js";

import {
    sendSolutionRequest
} from "./requests.js";

import {
    sendSolutionButtonHandler
} from "../handlers.js";


$(document).ready(function(){
    sendSolutionButtonHandler(function () {
        const code = editor.getValue();

        sendSolutionRequest(code, function (response) {
            const status = response["status"];
            const header = $(".code-file__block__header");

            if (status == 200) {
                header.addClass("success");
                header.html("Задача решена");
            } else if (status == 300) {
                header.addClass("error");
                header.html("Превышен лимит времени");
            } else if (status == 500) {
                header.addClass("error");
                header.html("Неверный ответ");
            }
        });
    });
});



