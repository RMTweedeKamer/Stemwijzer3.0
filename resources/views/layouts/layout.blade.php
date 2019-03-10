<!DOCTYPE html>
<html lang="nl_NL">
<head>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link rel="stylesheet" href="./css/kieswijzer-basestyle.css">
    <meta name="description" content="Officiële RMTK Stemwijzer">
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=0.5">
    <title>@yield('title')</title>
</head>
<body>
    <div class="menu">
        <div class="logo"></div>
        <ul class="navigation">
            <li><a href="./">Stemwijzer</a></li>
            <li><a href="./more">Extra's</a></li>
            <li><a href="./admin">Instellingen</a></li>
            <li><a href="./about">Over de Stemwijzer</a></li>
            <li><a href="https://motie.th8.nl">Motie tool</a></li>
        </ul>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>