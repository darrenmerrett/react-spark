<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'React Spark')</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <link href="{{ elixir('css/react-spark.css') }}" rel="stylesheet">
    <link href="{{ elixir('css/common.css') }}" rel="stylesheet">

    <link href="{{ elixir('css/react-dm-bootstrap.css') }}" rel="stylesheet">

    <link href="/css/sweetalert.css" rel="stylesheet">

    <script src="{{ elixir('js/fetch.js') }}"></script>

    <!-- Scripts -->
    @yield('scripts', '')

    <!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode(array_merge(
            Spark::scriptVariables(), []
        )); ?>
    </script>
</head>
<body class="with-navbar">
    <div>
        <!-- Navigation -->
        @if (Auth::check())
            @include('react-spark-vendor::user')
        @else
            @include('spark::nav.guest')
        @endif

        @yield('content')

        @if (Auth::check())
            @include('spark::modals.session-expired')
        @endif

        <script src="/js/sweetalert.min.js"></script>

        <script src="{{ elixir('js/common.js') }}"></script>
        <script src="{{ elixir('js/react-spark.js') }}"></script>
        <script src="{{ elixir('js/dropdown.js') }}"></script>

        @yield('footer-scripts')

    </div>
</body>
</html>
