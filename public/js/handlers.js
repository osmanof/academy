import {
    showModal,
    closeModal
} from "./modal.js";

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

function lockButtonHandler() {
    const buttons = $(".thema-lock__block");

    for (let index = 0; index < buttons.length; index++) {
        const element = $(buttons[index]);
        console.log(element);

        element.click(function () {
            if (element.hasClass("locked")) {
                $(element).removeClass("locked");
                $(element).addClass("unlocked");
                $(element).attr("title", "Скрыть");
            } else {
                $(element).removeClass("unlocked");
                $(element).addClass("locked");  
                $(element).attr("title", "Показать");
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

export {
    lockButtonHandler,
    themaButtonHandler,
    clickButtonHandler,
    classButtonHandler,
    courseButtonHandler,
    setClassButtonHandler,
    clickTaskButtonHandler,
    colorBlockButtonHandler,
    clickCloseButtonHandler,
    generateCodeButtonHandler,
    createCourseButtonHandler,
    clickCreateThemaButtonHandler,
    createNewSamplesTableRowButtonHandler
}
