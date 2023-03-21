<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta id="_csrf_token" name="csrf-token" content="{{ csrf_token() }}">
    <title>Тестовое задание</title>
    {{--        @vite([--}}
    {{--            'resources/css/styles.css',--}}
    {{--            'resources/css/bootstrap5.min.css',--}}
    {{--        ])--}}
    <link href="{{ asset('vue_assets/css/app.css')  }}" rel="stylesheet">
</head>
<body>
<main>
    {{ $slot }}
</main>
{{--@vite([
    'resources/js/scripts.js'
])--}}
<script src="{{ asset('vue_assets/js/chunk-vendors.js') }}"></script>
<script src="{{ asset('vue_assets/js/app.js') }}"></script>
</body>
</html>
