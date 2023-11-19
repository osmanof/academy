import { 
    isEmail,
    checkPassword
} from "./../checkFields.js";


$(document).ready(function(){
    $('.next[type="submit"]').click(function () {
        const name = $('input[name="tname"]').val().trim();
        const surname = $('input[name="tsname"]').val().trim();
        const lastname = $('input[name="tlname"]').val().trim();
        const email = $('input[name="temail"]').val().trim();
        const password = $('input[name="tpass"]').val().trim();
        
        if (name) {
            if (surname) {
                if (lastname) {
                    if (isEmail(email)) {
                        if (checkPassword(password)) {
                            $(".trform").trigger("submit");

                        } else {
                            raiseError("Пароль должен содержать как минимум 8 символов.");
                        }
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