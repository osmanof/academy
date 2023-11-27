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

function setThemaAccess(thema_id, accessType, afterCallback) {
    const token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: window.location.pathname + "/setthemaaccess",
        data: {
            thema_id: thema_id,
            type: accessType
        },
        method: 'POST',
        dataType: 'json',
        success: function (content) {
            console.log(content);
            if (content["status"] == 200) {
                afterCallback();
            }
        },
        error: function (c) {
            console.log(c);
        }
    });
}


export {
    setThemaAccess,
    createThemaRequest
}
