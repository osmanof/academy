import {
    createNewSamplesTableRowButtonHandler
} from "./handlers.js";


$(document).ready(function(){
    createNewSamplesTableRowButtonHandler(function () {
        $(".task__sample-table").append("<tr contenteditable><td>&nbsp;</td><td>&nbsp;</td></tr>");
    });
});
