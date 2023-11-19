<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/auth/index.css">
    <link rel="stylesheet" href="/css/error.css">
    <title>@yield('title')</title>
</head>
<body>
    <div class="logo"></div>

    <div class="container">
        @yield('content')
    </div>

    <div class="error-message__block">
        Ошибочка, сорян!
    </div>

</body>

<script src="/js/errors.js"></script>
@yield('scripts')

</html>


