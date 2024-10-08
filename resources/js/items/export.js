$(document).ready(function () {
    $('#btnCsvExport').on('click', function (e) {
        let secret = Date.now().toString(36) + Math.random().toString(36).substr(2);
        window.Cookie.set('localSecretKey', secret, { expires: 365 });

        $.ajax('export', {
            method: 'POST',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                secretKey: secret,
                from: $('#priceFrom').val(),
                to: $('#priceTo').val(),
            },

            success: function (response) {

            },
            error: function (error) {
                console.log(error)
            }
        })

    })
})
