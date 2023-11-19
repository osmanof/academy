import {
    checkIfCodeExists
} from "./requests.js";

import { 
    isEmail,
    checkPassword
} from "./../checkFields.js";


$(document).ready(function(){
    $('.next[type="submit"]').click(function () {
        const name = $('input[name="sname"]').val().trim();
        const surname = $('input[name="ssname"]').val().trim();
        const lastname = $('input[name="slname"]').val().trim();
        const email = $('input[name="semail"]').val().trim();
        const code = $('input[name="ccode"]').val().trim();
        const password = $('input[name="spass"]').val().trim();
        
        if (name) {
            if (surname) {
                if (lastname) {
                    if (isEmail(email)) {
                        checkIfCodeExists(code, function (status) {
                            if (status) {
                                if (checkPassword(password)) {
                                    $(".trform").trigger("submit");
                                    

                                } else {
                                    raiseError("Пароль должен содержать как минимум 8 символов.");
                                }
                            } else {
                                raiseError("Класса с таким кодом не существует.");
                            }
                        });
                    } else {
                        raiseError("Введите корректный E-mail.");
                    }
                } else {
                    raiseError("Введите отчество.");
                }
            } else {
                raiseError("Введите фамилию.");
            }
        } else {
            raiseError("Введите имя.");
        }
    });
});