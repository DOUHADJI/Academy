@aware(['title'])

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backoffice/fonts/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Flat Icons -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backoffice/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backoffice/css/select2/css/select2.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('backoffice/css/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}"> --}}

    <!-- CSS -->
    @vite('resources/css/app.css')
</head>
