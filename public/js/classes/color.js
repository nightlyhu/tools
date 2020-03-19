export class Color {
    static rgbToCmyk(rgb = {r: 0, g: 0, b: 0}) {
        console.log(rgb);

        const cmyk = {
            c: 0,
            m: 0,
            y: 0,
            k: 0
        };

        const red = rgb.r / 255;
        const green = rgb.g / 255;
        const blue = rgb.b / 255;

        cmyk.k = 1 - Math.max(red, green, blue);
        cmyk.c = (1 - red - cmyk.k) / (1 - cmyk.k);
        cmyk.m = (1 - green - cmyk.k) / (1 - cmyk.k);
        cmyk.y = (1 - blue - cmyk.k) / (1 - cmyk.k);

        cmyk.k = Math.round(cmyk.k * 100);
        cmyk.c = Math.round(cmyk.c * 100);
        cmyk.m = Math.round(cmyk.m * 100);
        cmyk.y = Math.round(cmyk.y * 100);

        return cmyk;
    }
}
