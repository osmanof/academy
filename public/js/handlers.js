import {
    showModal,
    closeModal
} from "./modal.js";

function clickButtonHandler() {
    console.log("as");
    $(".button-new").click(function () {
        console.log("hey!");
        showModal();
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
        const element = buttons[index];
        console.log(element);

        $(element).click(function () {
            $(".color-circle").removeClass("chosen");
            $(element).addClass("chosen");
        });
    }    
}

export {
    clickButtonHandler,
    classButtonHandler,
    courseButtonHandler,
    setClassButtonHandler,
    colorBlockButtonHandler,
    clickCloseButtonHandler,
    generateCodeButtonHandler,
    createCourseButtonHandler,
    clickCreateThemaButtonHandler
}
