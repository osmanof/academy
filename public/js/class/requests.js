function setCouseRequest(course_id) {
    const token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: window.location.pathname + "/changecourse",
        data: {
            course_id: course_id
        },
        method: 'POST',
        dataType: 'json',
        success: function (content) {
            console.log(content);
        },
        error: function (c) {
            console.log(c);
        }
    });
}

export {
    setCouseRequest
}

