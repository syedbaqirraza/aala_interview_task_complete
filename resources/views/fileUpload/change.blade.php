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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


</head>

<body>
    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif --}}
    <div id="app">
        <div class="container">
            <div class="col-lg-12">
                <water-mark-component></water-mark-component>
            </div>
            {{-- <div class="row mb-3">
            <div class="col-lg-12 margin-tb ">
                <div class="text-center mt-2">
                    <a class="btn btn-success" href="{{ url('files') }}" title="Upload files"> <i
                            class="fas fa-image fa-2x"></i> View All Files </a>
                </div>
            </div>
        </div>
        <form method="post" action="{{ url('update-water-mark') }}">
            @csrf
            <div class="form-group">
                <label for="inputFirstName">First Name</label>
                <input type="firstName" class="form-control" name="firstName" id="inputFirstName"
                    placeholder="Enter First Name">
            </div>
            <div class="form-group">
                <label for="inputMiddleName">Middle Name</label>
                <input type="middleName" class="form-control" name="middleName" id="inputMiddleName"
                    placeholder="Enter Middle Name">
            </div>
            <div class="form-group">
                <label for="inputLastName">Last Name</label>
                <input type="lastName" class="form-control" name="lastName" id="inputLastName"
                    placeholder="Enter Last Name">
            </div>
            <button type="submit" class="btn btn-primary">Add Water Mark</button>
        </form> --}}
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>

</body>

</html>
