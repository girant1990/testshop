let datatable;
$(document).ready(function () {
    let columns = [
        {
            name: 'name',
            width: 100,
            template: function (row) {
                return "<span style='color: red'>" + row[this.name] + "</span>"
            }
        },
        {
            name: 'price',
            width: 100,
        },

        {
            name: 'count',
            width: 100,
        },
        {
            name: 'options',
            width: 100,
            template: function (row) {
                return `<a href="/items/${row['id']}/edit">Edit</a>&nbsp;<a style="color: red" href="/items/${row['id']}/delete">Delete</a>`
            }
        }

    ]

    datatable = window.TDataTable.initDatatable($('#items-table'), columns);
    initListeners();
});

function initListeners() {
/*    $('.navigate-to').on('click', function (event) {
        event.preventDefault();
        let page = this.text;
        datatable.refreshDatatable(page);
    })*/
}

