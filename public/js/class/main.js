import {
    setCourseSelectHandler
} from "../handlers.js";

import {
    setCouseRequest
} from "./requests.js";


$(document).ready(function(){
    setCourseSelectHandler(setCouseRequest);
});
