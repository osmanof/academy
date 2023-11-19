function showModal() {
    $(".modal-window").css("display", "flex");
    $(".modal-window").animate({
        opacity: "1"
    }, 100);
    $(".modal-window__block").animate({
        marginTop: "0"
    }, 100);
}

function closeModal() {
    $(".modal-window").animate({
        opacity: "0"
    }, 100);
    setTimeout(function() {
        $(".modal-window").css("display", "none");
    }, 100);
    $(".modal-window__block").animate({
        marginTop: "50"
    }, 100);
    
}

export {
    showModal,
    closeModal
}
