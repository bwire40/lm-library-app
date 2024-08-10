import "./bootstrap";

import Alpine from "alpinejs";

import "flowbite";

window.Alpine = Alpine;

Alpine.start();

import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

window.onload = function() {
    flatpickr("#due-date-picker", {
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        static: true,
    });
};



