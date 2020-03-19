export class Clipboard {
    static copy(text) {
        let textArea = document.createElement("textarea");
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand("Copy");
        textArea.remove();

        if (text.length > 28) {
            text = text.substring(0, 25) + '...';
        }

        iziToast.success({
            title: 'Success!',
            message: '[' + text + '] copied to the clipboard!',
            position: 'topCenter'
        });
    }
}
