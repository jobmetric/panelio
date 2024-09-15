$(document).ready(function () {
    $('.change-language').on('click', function () {
        let lang = $(this).data('lang');
        $.ajax({
            url: '/set-language',
            type: 'POST',
            data: {
                _token: getCsrfToken(),
                lang: lang
            },
            success: function (json) {
                if(json.ok) {
                    location.reload();
                }
            }
        });
    });
});
