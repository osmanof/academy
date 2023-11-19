import {
    clickButtonHandler,
    classButtonHandler,
    setClassButtonHandler,
    clickCloseButtonHandler,
    generateCodeButtonHandler
} from "../handlers.js";

import {
    createClassRequest
} from "./requests.js";


function setClassCode(code) {
    const numbers = Array.from(code);

    for (let index = 1; index <= 7; index++){
        $(".class-code__digit.digit_" + index).html(numbers[index - 1]);   
    }
}

function createClassCard(title, tutor, code) {
    const cards = $(".cards");
    const class_card = `<div class="card" data-code="${code}">
            <div class="card__info">
                <div class="card__info__class-data">
                    <div class="card__info__class-data__title">${title}</div>
                    <div class="card__info__class-data__students">Учеников: <span>0</span></div>
                </div>
                <div class="card__info__class-info">
                    <div class="card__info__class-info__score">Средняя успеваемость: <span>0%</span></div>
                    <div class="card__info__class-info__tutor">Кл. руководитель: <span>${tutor}</span></div>
                </div>
            </div>
        </div>`;

    cards.append(class_card);

    setClassButtonHandler($(".card").last()[0]);
}


$(document).ready(function(){
    clickButtonHandler();
    clickCloseButtonHandler();
    classButtonHandler();
    generateCodeButtonHandler(function () {
        const classTitle = $('input[name="ctitle"]').val();
        const classTutor = $('input[name="ctutor"]').val();

        createClassRequest(classTitle, classTutor, function (code) {
            setClassCode(code);
            createClassCard(classTitle, classTutor, code);
        });
    });
});



