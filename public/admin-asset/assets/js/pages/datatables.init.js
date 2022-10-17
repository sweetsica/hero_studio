
/*
Template Name: Shreyu - Responsive Bootstrap 5 Admin Dashboard
Author: CoderThemes
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Data tables init js
*/


$(document).ready(function() {

    // Default Datatable
    // $('#basic-datatable').DataTable( {
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'csv',
    //         'excel',
    //         'pdf',
    //     ],
    //     select: true
    // } );

    // New databale table
    const table = $('#basic-datatable').DataTable({
        scrollX: true,
        scrollCollapse: true,
        paging: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
        ],
        fixedColumns: {
            left: 2
        }
    });
    table.buttons().container()
        .appendTo('#basic-datatable .col-md-6:eq(0)');

    // them class vào các btn của datatable cho giống theme
    $('.dt-buttons').children().addClass('btn btn-secondary')


    // //Buttons examples
    // var table = $('#datatable-buttons').DataTable({
    //     lengthChange: false,
    //     buttons: ['copy', 'print'],
    //     "language": {
    //         "paginate": {
    //             "previous": "<i class='uil uil-angle-left'>",
    //             "next": "<i class='uil uil-angle-right'>"
    //         }
    //     },
    //     "drawCallback": function () {
    //         $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
    //     }
    // });
    //
    // // Multi Selection Datatable
    // $('#selection-datatable').DataTable({
    //     select: {
    //         style: 'multi'
    //     },
    //     "language": {
    //         "paginate": {
    //             "previous": "<i class='uil uil-angle-left'>",
    //             "next": "<i class='uil uil-angle-right'>"
    //         }
    //     },
    //     "drawCallback": function () {
    //         $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
    //     }
    // });
    //
    // // Key Datatable
    // $('#key-datatable').DataTable({
    //     keys: true,
    //     "language": {
    //         "paginate": {
    //             "previous": "<i class='uil uil-angle-left'>",
    //             "next": "<i class='uil uil-angle-right'>"
    //         }
    //     },
    //     "drawCallback": function () {
    //         $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
    //     }
    // });
    //

    $(".dataTables_length select").addClass('form-select form-select-sm');
    $(".dataTables_length select").removeClass('custom-select custom-select-sm');

    $(".dataTables_length label").addClass('form-label');
} );
