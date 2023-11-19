function createCourseRequest(color, title, accessibility, afterCallback) {
    const token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: "/courses",
        data: {
            color: color,
            title: title,
            accessibility: accessibility
        },
        method: 'POST',
        dataType: 'json',
        success: function (content) {
            afterCallback(content["status"]);
        },
        error: function (c) {
            console.log("error", c);
        }
    });
}

export {
    createCourseRequest
}
