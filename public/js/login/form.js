import { 
    isEmail,
    checkPassword
} from "./../checkFields.js";

import {
    authenticate
} from "./requests.js";

$(document).ready(function(){
    $('.next[type="submit"]').click(function () {
        const email = $('input[name="email"]').val().trim();
        const password = $('input[name="pass"]').val().trim();

        if (isEmail(email)) {
            if (checkPassword(password)) {
                authenticate(email, password, function (response) {
                    if (response == 500) {
                        raiseError("Неверный логин или пароль.");
                    } else if (response == 200) {
                        window.location.reload();
                    }
                });
            } else {
                raiseError("Пароль должен содержать как минимум 8 символов.");
            }
        } else {
            raiseError("Введите корректный E-mail.");
        }
        
    });
});
