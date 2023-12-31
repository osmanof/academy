import {
    showModal,
    closeModal
} from "./modal.js";

import {
    setThemaAccess
} from "./course/requests.js";


function clickButtonHandler() {
    $(".button-new").click(function () {
        showModal();
    });
}

function clickTaskButtonHandler() {
    $(".button-new").click(function () {
        const currentLink = window.location.pathname;
        window.location.href = currentLink + "/new-task";
    });
}

function clickCloseButtonHandler() {
    $(".modal-window .close-button").click(function () {
        closeModal();
    });
}

function clickCreateThemaButtonHandler(action) {
    $(".add-thema__button").click(action);
}

function generateCodeButtonHandler(action) {
    $(".button-generate__block .button").click(action);
}

function setClassButtonHandler(button) {
    console.log(button);
    $(button).click(function() {
        const ccode = $(button).attr("data-code");

        window.location.href = "classes/" + ccode;
    });
}

function setCourseButtonHandler(button) {
    console.log(button);
    $(button).click(function() {
        const ccode = $(button).attr("data-id");

        window.location.href = "courses/" + ccode;
    });
}

function classButtonHandler() {
    const buttons = $(".card");

    for (let index = 0; index < buttons.length; index++) {
        const element = buttons[index];
        setClassButtonHandler(element);
    }
}

function courseButtonHandler() {
    const buttons = $(".course__block");

    for (let index = 0; index < buttons.length; index++) {
        const element = buttons[index];
        setCourseButtonHandler(element);
    }
}

function createCourseButtonHandler(action) {
    $(".create-course__button").click(action);
}

function colorBlockButtonHandler() {
    const buttons = $(".color-circle");

    for (let index = 0; index < buttons.length; index++) {
        const element = $(buttons[index]);
        console.log(element);

        element.click(function () {
            $(".color-circle").removeClass("chosen");
            element.addClass("chosen");
        });
    }    
}

function themaButtonHandler() {
    const buttons = $(".thema-info__block");

    for (let index = 0; index < buttons.length; index++) {
        const element = $(buttons[index]);
        const id = element.attr("data-id");
        console.log(element);

        element.click(function () {
            window.location.href = "/themas/" + id;
        });
    }
}

function taskButtonHandler() {
    const buttons = $(".task-info__block");

    for (let index = 0; index < buttons.length; index++) {
        const element = $(buttons[index]);
        const id = element.attr("data-id");
        console.log(element);

        element.click(function () {
            window.location.href = "/tasks/" + id;
        });
    }
}

function lockButtonHandler() {
    const buttons = $(".thema-lock__block");

    for (let index = 0; index < buttons.length; index++) {
        const element = $(buttons[index]);

        element.click(function () {
            const id = element.attr("data-id");
            if (element.hasClass("locked")) {
                setThemaAccess(id, 1, function () {
                    element.removeClass("locked");
                    element.addClass("unlocked");
                    element.attr("title", "Скрыть");
                });
            } else {
                setThemaAccess(id, 0, function () {
                    element.removeClass("unlocked");
                    element.addClass("locked");  
                    element.attr("title", "Показать");
                });
            }
        });
    }
}

function createTaskButtonHandler(action) {
    $(".button-new").click(action);
}

function createNewSamplesTableRowButtonHandler(action) {
    $(".task__sample-table_add-row_button").click(function () {
        action();
        var block = $(".content__data-left");
        block.scrollTop(block.prop('scrollHeight'));
    });
}

function setCourseSelectHandler(action) {
    const setCourseSelect = $('select[name="set_course"]');
    setCourseSelect.change(function () {
        const value = setCourseSelect.val();

        action(value);
    });
}

function sendSolutionButtonHandler(action) {
    const textarea = $("#code");
    const button = $(".send-solution__button");
    const header = $(".code-file__block__header");

    button.click(function () {
        action();
        header.removeClass("error");
        header.removeClass("success");
        header.addClass("checking");
        header.html("На проверке");
    });
}

export {
    taskButtonHandler,
    lockButtonHandler,
    themaButtonHandler,
    clickButtonHandler,
    classButtonHandler,
    courseButtonHandler,
    setClassButtonHandler,
    setCourseSelectHandler,
    clickTaskButtonHandler,
    colorBlockButtonHandler,
    clickCloseButtonHandler,
    sendSolutionButtonHandler,
    generateCodeButtonHandler,
    createCourseButtonHandler,
    clickCreateThemaButtonHandler,
    createNewSamplesTableRowButtonHandler
}
