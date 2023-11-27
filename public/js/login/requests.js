function authenticate(email, password, afterCallback) {
    const token = $('input[name="_token"]').attr('value');
    console.log("token:", token);

    var result = 0;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: "/login",
        data: {
            email: email,
            password: password
        },
        method: 'POST',
        dataType: 'json',
        success: function (content) {
           afterCallback(content["status"]);
        },
        error: function (c) {
            console.log(c);
            result = 10;
        }
    });
}

export {
    authenticate
}
