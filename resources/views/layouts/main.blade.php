<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=@, initial-scale=1.0">
    <title>Sylhet Job Center</title>
    <script defer src="{{ asset('js/app.js') }}"></script>
    
    @include('partials.head')
</head>

<body>
    @include('partials.nav')

    @yield('content')



    @include('partials.footer')
</body>

</html>