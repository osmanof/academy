function createThemaRequest(title, date, time, type, afterCallback) {
    const token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: "",
        data: {
            title: title,
            date: date,
            time: time,
            type: type
        },
        method: 'POST',
        dataType: 'json',
        success: function (content) {
            afterCallback(content["status"]);
        },
        error: function (c) {
            console.log(c);
        }
    });
}

export {
    createThemaRequest
}
