$(document).ready(function () {
    var table = $('#products').DataTable({
        "ordering": false,
        "language": {
            "search": "",
            "infoFiltered": "",
        },
        "paging": true,
        "aLengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
        "iDisplayLength": 5,
        initComplete: function () { 
            $('.dataTables_filter .form-control').focus();  

        }
    });

    buildSelect(table);
    table.on('draw');
});

function buildSelect(table) {
    table.columns(1).every(function () {
        var column = table.column(this, {
            search: 'applied'
        });
        var select = $(
                '<select class="form-control custom-select mb-3"><option value="">Choose Category</option></select>'
                )
            .appendTo('.search')
            .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                );

                column
                    .search(val ? '^' + val + '$' : '', true, false)
                    .draw();
            });

        column.data().unique().sort().each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
        });

        // The rebuild will clear the exisiting select, so it needs to be repopulated
        var currSearch = column.search();
        if (currSearch) {
            select.val(currSearch.substring(1, currSearch.length - 1));
        }
    });
}