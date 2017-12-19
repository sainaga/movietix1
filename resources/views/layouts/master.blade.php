<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>MovieTix</title>

        <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="/css/loading.css">
        <link rel="stylesheet" href="/css/loading-btn.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/css/style.css">
         <script>
        window.Laravel =  <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
        </script>

    </head>
    <body>
        <div id="app">
            @include('partials/_header')
            @include('partials/_flash')

            @yield('content')
            
            @include('partials/_footer')
        </div>

          <script type="text/javascript"  src="/js/app.js"></script>
          <script type="text/javascript"  src="/js/vue.js"></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
           <script type="text/javascript"  src="/js/script.js"></script>
       <!--    <script src="/tinymce/js/tinymce/tinymce.min.js"></script> -->
       <script>
          $( function() {
            $( "#datepicker" ).datepicker();
          } );
          </script>
    </body>
</html>
