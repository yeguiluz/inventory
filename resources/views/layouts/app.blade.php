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
    {!! Html::style('https://bootswatch.com/4/yeti/bootstrap.min.css') !!}
    @yield('ccs')
</head>
<body>
    <div id="app">
      @yield('main')
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-12">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
    {!! Html::script('https://code.jquery.com/jquery-3.2.1.min.js') !!}
    {!! Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js')!!}
    @yield('js')
    @yield('jQuery')
</body>
</html>
