let translations = $('#translations')
$(document).ready(function () {
    Echo.channel('items')
        .listen('ItemUpdatedEvent', (e) => {
        data = JSON.parse(e.item);
        card = $('#' + data.id);
        if (card.length > 0) {
            data.count === 0 ? card.find('#' + data.id + '_count').text(translations.data('expired')) : card.find('#' + data.id + '_count').text(data.count);
            card.find('#' + data.id + '_name').text(data.name);
            card.find('#' + data.id + '_cost').text(data.price);
        }

    })

    Echo.channel('export-finished')
        .listen('ExportFinished', (e) => {
            let localSecretKey = Cookie.get('localSecretKey');

            if (localSecretKey === e.secretKey) {
                let modal = $('#downloadCSVModal');
                modal.find('#downloadLink').attr('href', '/download/' + e.fileName);
                modal.modal('show');
            }
        })
})
