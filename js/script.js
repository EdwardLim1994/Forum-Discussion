$(document).ready(function () {
    'use strict';

    var year = new Date().getFullYear();
    $('#latestYear').text(year);

    $('.whatsappLink').on('click', function () {
        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

        if (isMobile) {
            window.open(
                "https://wa.me/+60126113810?text=I want to know more about Attendance System.",
                "_blank");
        } else {
            window.open(
                "https://web.whatsapp.com/send?phone=%2B60126113810&text=I want to know more about Attendance System.&app_absent=0",
                "_blank");
        }
    });

})