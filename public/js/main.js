$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#template-links').on('keyup', function () {
        $.ajax({
           url: '/get/category',
           data: {
               'v':$('#template-links').val(),
           },
            dataType: 'JSON',
           method: 'POST',
           success: function ($data) {
               $.each( $data, function( key, value ) {
                   $('#search-result').empty();
                   console.log(value.title);
                   $('#search-result').html("<li class='list-group-item'> <a href='cast/"+value.id+"'>" +value.title+ "</a></li>");
               });
           }
        });
    });

    $('#template-links').on('focusout', function () {
        setTimeout(function () {
            $('#search-result').empty();
        }, 500);
    });
});


