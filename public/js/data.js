$(document).ready(function() {
    
    $('#table_id').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
    });

    // $("form input:checkbox").on('change',function(){

    //     var id = "#" + this.value;

    //     var all = $('tr');

    //     $.each(all, function() {
    //             var idx = $(this).index();
    //             $.each($('tr'), function() {
    //                 $(this).find('td').eq(idx).show();
    //             });
    //     });


    //     if(this.checked == false){
    //         $(id).addClass("masked");
    //     } else {
    //         $(id).removeClass("masked");
    //     }

    //     var masked = $('.masked');

    //     $.each(masked, function() {
    //             var idx = $(this).index();
    //             $.each($('tr'), function() {
    //                 $(this).find('td').eq(idx).hide();
    //             });
    //     });

    // });
});