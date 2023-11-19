var shown = false;

function showErrorBlock() {
    $(".error-message__block").css("display", "inline");
    $(".error-message__block").animate({
        top: "10px",
        opacity: "1"
    }, 200);

    shown = true;
}

function closeErrorBlock() {
    $(".error-message__block").animate({
        top: "-55px",
        opacity: "0"
    }, 200);
    setTimeout(function() {
        $(".error-message__block").css("display", "none");
        shown = false;
    }, 200);
}

function raiseError(text) {
    if (!shown) {
        $(".error-message__block").html(text);

        showErrorBlock();
        setTimeout(closeErrorBlock, 3000);
    }
}
