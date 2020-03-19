import {Clipboard} from "./classes/clipboard.js";
import {Color} from "./classes/color.js";

$(function () {
    let $picker = $('#colorPicker');

    function colorCombination(hex, isLight = true, extraInfo = "") {
        return '<div class="colorPicker-combination-colorDiv">' +
            '<div class="colorPicker-combination-color" style="background-color: ' + hex + '">&nbsp;</div>' +
            '<a href="javascript:void(0)" class="colorPicker-combination-colorOverlay" data-color="' + hex + '">' +
            '<i class="mdi mdi-content-copy mdi-36px ' + (isLight ? 'text-secondary' : 'text-white') + '"></i>' +
            '</a>' +
            '<div class="colorPicker-combination-colorInfo" style="line-height: 1.2;">' + hex + '<br>' + (extraInfo ? "<small>" + extraInfo + "</small>" : '') + '</div>' +
            '</div>';
    }

    let $color = $("#colorPicker-color");

    $picker.colorpicker({
        color: '#' + $picker.attr('data-color'),
        inline: true,
        container: true,
        sliders: {
            saturation: {
                maxLeft: 210,
                maxTop: 200
            },
            hue: {
                maxLeft: 0,
                maxTop: 200
            },
            alpha: {
                maxLeft: 0,
                maxTop: 200
            }
        }
    }).on('colorpickerChange colorpickerCreate', function (e) {
            let color = tinycolor(e.value.toString());
            $color.val(color.toRgbString());

            history.pushState("", "", '/color-picker/' + color.toHex());

            // information
            $("#colorPicker-hex").html(color.toHexString());
            $("#colorPicker-hex8").html(color.toHex8String());
            $("#colorPicker-rgb").html(color.toRgbString());
            $("#colorPicker-hsl").html(color.toHslString());
            $("#colorPicker-hsv").html(color.toHsvString());
            $("#colorPicker-brightness").html(color.getBrightness());
            $("#colorPicker-alpha").html(color.getAlpha() + ' (' + parseInt(color.getAlpha() * 100) + '%)');
            $("#colorPicker-brightness-info").html(
                (color.isLight() ? 'Light' : '') +
                (color.isDark() ? 'Dark' : '')
            );
            $("#colorPicker-name").html(color.toName() ? color.toName() : '-');

            const rgb = color.toRgb();
            const cmyk = Color.rgbToCmyk(rgb);

            $("#colorPicker-rgbColors").html(
                '<span class="colorPicker-color-icon" style="background-color: red"></span> <span>' + rgb.r + '</span> ' +
                '<span class="colorPicker-color-icon" style="background-color: green"></span> <span>' + rgb.g + '</span> ' +
                '<span class="colorPicker-color-icon" style="background-color: blue"></span> <span>' + rgb.b + '</span>'
            );

            $("#colorPicker-cmykColors").html(
                '<span class="colorPicker-color-icon" style="background-color: cyan"></span> <span>' + cmyk.c + '</span> ' +
                '<span class="colorPicker-color-icon" style="background-color: magenta"></span> <span>' + cmyk.m + '</span> ' +
                '<span class="colorPicker-color-icon" style="background-color: yellow"></span> <span>' + cmyk.y + '</span> ' +
                '<span class="colorPicker-color-icon" style="background-color: black"></span> <span>' + cmyk.k + '</span>'
            );

            let hiddenColors = ["#000000", "#ffffff"];

            // combinations
            let div = $("#colorPicker-analogous");
            div.html("");
            color.analogous().map(function (t) {
                const hex = t.toHexString();
                if (!hiddenColors.includes(t.toHexString())) {
                    div.append(colorCombination(hex, t.isLight()));
                }
            });

            if (div.html() === "") {
                div.html("<p class='pl-1'>No 'analogous' colors.</p>");
            }

            div = $("#colorPicker-monochromatic");
            div.html("");
            color.monochromatic().map(function (t) {
                const hex = t.toHexString();
                div.append(colorCombination(hex, t.isLight()));
            });

            div = $("#colorPicker-splitcomplement");
            div.html("");
            color.splitcomplement().map(function (t) {
                const hex = t.toHexString();
                if (!hiddenColors.includes(t.toHexString())) {
                    div.append(colorCombination(hex, t.isLight()));
                }
            });

            if (div.html() === "") {
                div.html("<p class='pl-1'>No 'split complement' colors.</p>");
            }

            div = $("#colorPicker-triad");
            div.html("");
            color.triad().map(function (t) {
                const hex = t.toHexString();
                if (!hiddenColors.includes(t.toHexString())) {
                    div.append(colorCombination(hex, t.isLight()));
                }
            });

            if (div.html() === "") {
                div.html("<p class='pl-1'>No 'triad' colors.</p>");
            }

            div = $("#colorPicker-tetrad");
            div.html("");
            color.tetrad().map(function (t) {
                const hex = t.toHexString();
                if (!hiddenColors.includes(t.toHexString())) {
                    div.append(colorCombination(hex, t.isLight()));
                }
            });

            if (div.html() === "") {
                div.html("<p class='pl-1'>No 'tetrad' colors.</p>");
            }

            const complement = color.complement();
            const greyscale = color.clone().greyscale();
            const brighten10 = color.clone().brighten(10);
            const brighten20 = color.clone().brighten(20);
            const desaturate = color.clone().desaturate(10);
            const saturate = color.clone().saturate(10);

            div = $("#colorPicker-transform");
            div.html("");
            if (!hiddenColors.includes(complement.toHexString())) {
                div.append(colorCombination(complement.toHexString(), complement.isLight(), 'complement'));
            }
            if (!hiddenColors.includes(greyscale.toHexString())) {
                div.append(colorCombination(greyscale.toHexString(), greyscale.isLight(), 'greyscale'));
            }
            if (!hiddenColors.includes(desaturate.toHexString())) {
                div.append(colorCombination(desaturate.toHexString(), desaturate.isLight(), 'desaturate (10%)'));
            }
            if (!hiddenColors.includes(saturate.toHexString())) {
                div.append(colorCombination(saturate.toHexString(), saturate.isLight(), 'saturate (10%)'));
            }
            if (!hiddenColors.includes(brighten10.toHexString())) {
                div.append(colorCombination(brighten10.toHexString(), brighten10.isLight(), 'brighten (10%)'));
            }
            if (!hiddenColors.includes(brighten20.toHexString())) {
                div.append(colorCombination(brighten20.toHexString(), brighten20.isLight(), 'brighten (20%)'));
            }

            if (div.html() === "") {
                div.html("<p class='pl-1'>No 'transformable' colors.</p>");
            }

            div = $("#colorPicker-lighten");
            div.html("");
            for (let li = 1; li < 7; li++) {
                const lc = color.clone().lighten(li * 5);
                if (!hiddenColors.includes(lc.toHexString())) {
                    div.append(colorCombination(lc.toHexString(), lc.isLight(), 'lighten (' + (li * 5) + '%)'));
                }
            }
            for (let di = 1; di < 7; di++) {
                const dc = color.clone().darken(di * 5);
                if (!hiddenColors.includes(dc.toHexString())) {
                    div.append(colorCombination(dc.toHexString(), dc.isLight(), 'darken (' + (di * 5) + '%)'));
                }
            }

            if (div.html() === "") {
                div.html("<p class='pl-1'>No 'lighten/darken' colors.</p>");
            }
        }
    );

    $("#colorPicker-hex-copy").on('click', function () {
        Clipboard.copy($("#colorPicker-hex").text());
    });

    $("#colorPicker-hex8-copy").on('click', function () {
        Clipboard.copy($("#colorPicker-hex8").text());
    });

    $("#colorPicker-rgb-copy").on('click', function () {
        Clipboard.copy($("#colorPicker-rgb").text());
    });

    $("#colorPicker-hsl-copy").on('click', function () {
        Clipboard.copy($("#colorPicker-hsl").text());
    });

    $("#colorPicker-hsv-copy").on('click', function () {
        Clipboard.copy($("#colorPicker-hsv").text());
    });

    $("#colorPicker-share").on('click', function () {
        Clipboard.copy(location.href);
    });

    $("#colorPicker-combination").on('click', '.colorPicker-combination-colorOverlay', function () {
        Clipboard.copy($(this).attr('data-color'));
    });

    $("#colorPicker-random").on('click', function () {
        const random = tinycolor.random();
        $("#colorPicker").colorpicker('setValue', random.toRgbString());
        $color.val(random.toRgbString());
    });

    $color.on('paste blur', function () {
        const selected = $(this).val().trim();
        $("#colorPicker").colorpicker('setValue', selected);
    });

    $color.on('keyup', function () {
        if (this.key === 'Enter') {
            const selected = $(this).val().trim();
            $("#colorPicker").colorpicker('setValue', selected);
        }
    });
});
