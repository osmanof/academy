function createClassRequest(title, tutor, afterCallback) {
    const token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: "/classes",
        data: {
            title: title,
            tutor: tutor
        },
        method: 'POST',
        dataType: 'json',
        success: function (content) {
            afterCallback(content["code"]);
        },
        error: function (c) {
            console.log(c);
        }
    });
}

export {
    createClassRequest
}
