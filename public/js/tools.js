import {Clipboard} from "./classes/clipboard.js";

$(function () {
    $("[data-toggle='tooltip']").tooltip();

    $("#hashGenerator-copy").on('click', function () {
        Clipboard.copy($("#hashGenerator-result-value").text());
    });

    $("#hashGenerator-remove").on('click', function () {
        $("#hashGenerator-result-value").html('');
        $("#hashGenerator-result").hide();
    });

    $("#hashGenerator-make").on('click', function () {
        let text = $("#hashGenerator-text").val().trim();
        if (text.length === 0) {
            iziToast.error({
                title: 'Missing value!',
                message: 'The plain text field is empty!',
                position: 'topCenter'
            });
            return false;
        }

        $.ajax({
            method: "POST",
            url: "/tool/generate-hash",
            data: {
                text: text,
                algorithm: $("#hashGenerator-algorithm").val()
            },
            dataType: "json",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        })
            .done(function (response) {
                console.log(response);
                if (response.success) {
                    $("#hashGenerator-result").show();
                    $("#hashGenerator-result-value").html(response.result);
                } else {
                    $("#hashGenerator-result").hide();
                    iziToast.error({
                        title: 'Failed!',
                        message: response.message,
                        position: 'topCenter'
                    });
                }
            })
            .fail(function (err) {
                $("#hashGenerator-result").hide();
                console.log(err);
                iziToast.error({
                    title: 'Server error!',
                    position: 'topCenter'
                });
            });
    });

    $("#passGenerator-copy").on('click', function () {
        Clipboard.copy($("#passGenerator-result-value").text());
    });

    $("#passGenerator-remove").on('click', function () {
        $("#passGenerator-result-value").html('');
        $("#passGenerator-result").hide();
    });

    $("#passGenerator-make").on('click', function () {
        let length = parseInt($("#passGenerator-length").val().trim());
        if (length === 0 || isNaN(length)) {
            iziToast.error({
                title: 'Missing value!',
                message: 'The length field is empty!',
                position: 'topCenter'
            });
            return false;
        }

        $.ajax({
            method: "POST",
            url: "/tool/generate-pass",
            data: {
                length: length,
                strength: $("#passGenerator-strength").val()
            },
            dataType: "json",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        })
            .done(function (response) {
                console.log(response);
                if (response.success) {
                    $("#passGenerator-result").show();
                    $("#passGenerator-result-value").html(response.result);
                } else {
                    $("#passGenerator-result").hide();
                    iziToast.error({
                        title: 'Failed!',
                        message: response.message,
                        position: 'topCenter'
                    });
                }
            })
            .fail(function (err) {
                $("#passGenerator-result").hide();
                console.log(err);
                iziToast.error({
                    title: 'Server error!',
                    position: 'topCenter'
                });
            });
    });

    $("#ipLookup-search").on('click', function () {
        let fields = 'fields=status,message,country,city,org,reverse,query';
        let what = $("#ipLookup-what").val().trim();
        if (what.length === 0) {
            iziToast.error({
                title: 'Missing value!',
                message: 'The field is empty!',
                position: 'topCenter'
            });
            return false;
        }

        $.ajax({
            method: "GET",
            url: "http://ip-api.com/json/" + what + "?" + fields,
            dataType: "json"
        })
            .done(function (response) {
                console.log(response);
                if (response.status === 'success') {
                    $("#ipLookup").modal('show');
                    $("#ipLookupQry").html(response.query);
                    $("#ipLookupReverse").html(response.reverse.length > 0 ? response.reverse : what);
                    $("#ipLookupOrg").html(response.org);
                    $("#ipLookupLoc").html(response.country + ', ' + response.city);
                } else {
                    iziToast.error({
                        title: 'Failed!',
                        message: 'The request is not possible. Please try again later!',
                        position: 'topCenter'
                    });
                }
            })
            .fail(function (err) {
                console.log(err);
                iziToast.error({
                    title: 'Server error!',
                    position: 'topCenter'
                });
            });
    });

    $("#encoder-copy").on('click', function () {
        Clipboard.copy($("#encoder-result-value").text());
    });

    $("#encoder-remove").on('click', function () {
        $("#encoder-result-value").html('');
        $("#encoder-result").hide();
    });

    $("#encoder-make").on('click', function () {
        let val = $("#encoder-input").val().trim();
        if (val.length === 0) {
            iziToast.error({
                title: 'Missing value!',
                message: 'The field is empty!',
                position: 'topCenter'
            });
            return false;
        }

        $.ajax({
            method: "POST",
            url: "/tool/encoder",
            data: {
                input: val,
                method: $("#encoder-method").val(),
                action: $("#encoder-action").val()
            },
            dataType: "json",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        })
            .done(function (response) {
                console.log(response);
                if (response.success) {
                    $("#encoder-result").show();
                    $("#encoder-result-value").html(response.result);
                } else {
                    $("#encoder-result").hide();
                    iziToast.error({
                        title: 'Failed!',
                        message: response.message,
                        position: 'topCenter'
                    });
                }
            })
            .fail(function (err) {
                $("#encoder-result").hide();
                console.log(err);
                iziToast.error({
                    title: 'Server error!',
                    position: 'topCenter'
                });
            });
    });

    $("#textTransform-copy").on('click', function () {
        Clipboard.copy($("#textTransform-result-value").text());
    });

    $("#textTransform-remove").on('click', function () {
        $("#textTransform-result-value").html('');
        $("#textTransform-result").hide();
    });

    $("#textTransform-transform").on('click', function () {
        let val = $("#textTransform-input").val().trim();
        if (val.length === 0) {
            iziToast.error({
                title: 'Missing value!',
                message: 'The field is empty!',
                position: 'topCenter'
            });
            return false;
        }

        $.ajax({
            method: "POST",
            url: "/tool/text-transform",
            data: {
                input: val,
                action: $("#textTransform-action").val(),
                multiple: $("#textTransform-multiple").is(':checked')
            },
            dataType: "json",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        })
            .done(function (response) {
                console.log(response);
                if (response.success) {
                    $("#textTransform-result").show();
                    $("#textTransform-result-value").html(response.result);
                } else {
                    $("#textTransform-result").hide();
                    iziToast.error({
                        title: 'Failed!',
                        message: response.message,
                        position: 'topCenter'
                    });
                }
            })
            .fail(function (err) {
                $("#textTransform-result").hide();
                console.log(err);
                iziToast.error({
                    title: 'Server error!',
                    position: 'topCenter'
                });
            });
    });
});
