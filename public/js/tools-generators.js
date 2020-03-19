import {Clipboard} from "./classes/clipboard.js";

$(function () {
    $('#colorPicker').colorpicker({
        popover: {
            title: 'Adjust the color',
            format: 'auto',
            autoInputFallback: false,
            placement: 'top'
        }
    }).on('colorpickerChange colorpickerCreate', function (e) {
        let color = tinycolor(e.value.toString());
        $("#colorPicker-hex").html(color.toHexString());
        $("#colorPicker-rgb").html(color.toRgbString());
        $("#colorPicker-hsl").html(color.toHslString());
        $("#colorPicker-name").html(color.toName() ? color.toName() : '-');
    });

    $("#colorPicker-hex-copy").on('click', function () {
        Clipboard.copy($("#colorPicker-hex").text());
    });

    $("#colorPicker-rgb-copy").on('click', function () {
        Clipboard.copy($("#colorPicker-rgb").text());
    });

    $("#colorPicker-hsl-copy").on('click', function () {
        Clipboard.copy($("#colorPicker-hsl").text());
    });
});
