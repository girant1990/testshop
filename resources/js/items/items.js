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
                return `<a class="btn btn-warning btn-sm" href="/admin/items/${row['id']}/edit">Edit</a>&nbsp;
                           <button class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal"
                                    data-bs-link="/admin/items/${row['id']}/"
                                    type="button" >Delete</button>
`
            }
        }

    ]

    datatable = tdataTable.initDatatable($('#items-table'), columns);
    initListeners();
});

function initListeners() {
    $('#confirmDeleteModal').on('show.bs.modal', function(event) {
        let btn = event.relatedTarget;
        let url = $(btn).data('bs-link');
        $('#deleteForm').attr('action', url);
    })

}

