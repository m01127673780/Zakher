$(function () {
    $(".data_table").DataTable({
        "ordering": false,
        "paging": true,
        /* "dom":' <"search"f><"top"l>rt<"bottom"ip><"clear">' */

        initComplete: function () {
            $('.buttons-excel').addClass('btn btn-sm btn-success');
            $('.buttons-excel').html('<i class="far fa-file-excel"></i>Export to Excel');
             $('.dataTables_info').addClass('hide-column');
                $('.dataTables_length').addClass('hide-column');
                $('.dataTables_filter').addClass('hide-column');
                $('.dataTables_paginate').addClass('hide-column');     
                $('.dataTables_filter .form-control').focus();           
        }
    });



});