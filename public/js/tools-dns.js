$(function () {
    const $input = $("#dns-domain");
    const $btn = $("#dns-domain-action");

    $btn.on("click", () => {
        const domain = $input.val().trim();
        location.href = "/dns/" + domain;
    });

    $input.on('keyup', e => {
        if (e.key === 'Enter') {
            $btn.trigger("click");
        }
    });
});
