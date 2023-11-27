<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/second/index.css">
    @yield("stylesheets")
    <title>@yield("title")</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo-block">
                <div class="logo"></div>
            </div>
            <div class="menu">
                <div class="menu__link themas-item">Темы</div>
                <div class="menu__link ide-item">IDE</div>
            </div>
            <div class="user">
                <div class="user__name">
                    {{ $user->name }} {{ $user->lastname }}
                </div>
            </div>
        </div>

        @yield("data")

    </div>


</body>
@yield("scripts")
<script src="/js/sstandart.js" type="module"></script>
</html>