<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>API Specifications</title>
    </head>
    <body class="antialiased">
         <div id="swagger-api">
         </div>
         @vite('resources/js/swagger.js')
    </body>
</html>
