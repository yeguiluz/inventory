<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {!! Html::style('https://bootswatch.com/4/cerulean/bootstrap.css') !!}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

    @yield('ccs')
</head>
<body>
    @yield('main')
    <div id="app" class="container">
      <div class="row">
        <div id="content" class="col-md-12">
          @yield('content')
        </div>
      </div>
    </div>
    {!! Html::script('https://code.jquery.com/jquery-3.2.1.min.js') !!}
    {!! Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js')!!}
    {!! Html::script('https://cdn.jsdelivr.net/npm/vue')!!}
    {!! Html::script('https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js')!!}
    @yield('js')
    @yield('jQuery')
</body>
</html>
