function sendSolutionRequest(code, afterCallback) {
    const token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: window.location.pathname + "/sendsolution",
        data: {
            code: code
        },
        method: 'POST',
        dataType: 'json',
        success: function (content) {
            const header = $(".code-file__block__header");
            header.removeClass("checking");
            console.log(content);
            afterCallback(content);
        },
        error: function (c) {
            console.log("error", c);
        }
    });
}

export {
    sendSolutionRequest
}

