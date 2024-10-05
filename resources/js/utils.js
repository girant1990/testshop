export class TDataTable {
    constructor() {
        let element;
        let columns = [];
        let page = 1;
    }
    initDatatable (element, columns = [], page = 1, type = 'local-data') {
        this.columns = columns;
        this.element = element;
        let url = element.data('url') + '?page=' + this.page;
        let table = "<table class='table'><tbody><tr>";
        columns.forEach( (column) => {
            table += '<th>' + column.name + '</th>';
        })
        table += "</tr>";
        if (type === 'local-data') {
            this.initWithLocalData(table)
        } else {
            this.initWithAjax(table)
        }

        return this;
    }

    refreshDatatable(page) {
        this.page = page;
        this.element.html('');
        this.initDatatable(this.element, this.columns);
    }

    initWithAjax(table) {
        let drawTable = this.drawTable;
        $.ajax({
            url: url,
            dataType: 'json',
            method: 'GET',
            success: function (data) {
                drawTable(data.data, table, false);
            },
            error: function (data) {
                drawTable(data, table, true);
            }
        })
    }

    drawTable(data, table, isEmpty) {
        if (isEmpty) {
            table += `<tr><div class="text-center w-100">No data</div></tr></table>`
            this.element.html(table);
            return;
        }
        data.forEach( (item) => {
            this.table += '<tr>';
            this.columns.forEach((col) => {
                if (col.template) {
                    table += '<td>' + col.template(item) + '</td>';
                } else {
                    table += '<td>' + item[col.name] + '</td>';
                }
            })
            table += '</tr>';
        })
        this.element.append(table);
    }

    initWithLocalData(table) {
        this.drawTable(collection, table, collection.length <= 0)
    }
}
