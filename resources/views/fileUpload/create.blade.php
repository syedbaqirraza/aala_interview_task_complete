<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Login Page">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <div id="app">
        <file-form-component></file-form-component>
    </div>
    <script type="text/javascript">
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        // $(document).ready(function() {
        //     $('#upload_form').on('submit', function(event) {
        //         event.preventDefault();
        //         $.ajax({
        //             url: "{{ url('ajax-upload-file') }}",
        //             method: "POST",
        //             data: new FormData(this),
        //             dataType: 'JSON',
        //             contentType: false,
        //             processData: false,
        //             success: function(data) {
        //                 if (data.success != null) {
        //                     $('#imageSelect').val('');
        //                     $('#message').removeClass('d-none');
        //                     $('#message').addClass('d-block');
        //                     $('#message').text(data.success);
        //                 } else if (data.exception != null) {
        //                     $('#error').removeClass('d-none');
        //                     $('#error').addClass('d-block');
        //                     $('#error').text(data.exception);
        //                 } else {
        //                     console.log(data.error);
        //                     $('#error').removeClass('d-none');
        //                     $('#error').addClass('d-block');
        //                     $.each(data.error, function(index, value) {
        //                         $('#error').text(value);
        //                     });
        //                 }
        //             }
        //         });
        //     });
        // });
    </script>

    <script src="{{ mix('js/app.js') }}"></script>

</body>

</html>
