export class Core {
    static initCookie() {
        let script = document.createElement('script');
        script.setAttribute('src', 'https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js');
        document.body.appendChild(script);

        let style = document.createElement("link");
        style.setAttribute("rel", "stylesheet");
        style.setAttribute("type", "text/css");
        style.setAttribute("href", "https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css");
        document.head.appendChild(style);

        window.addEventListener("load", function () {
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#3c404d",
                        "text": "#d6d6d6"
                    },
                    "button": {
                        "background": "transparent",
                        "text": "#078169",
                        "border": "#078169"
                    }
                },
                "content": {
                    "message": "This website uses cookies to ensure you get the best experience on our website.",
                    "dismiss": "OK",
                    "link": "More information"
                }
            })
        });
    }
}
