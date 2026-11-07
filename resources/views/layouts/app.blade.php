<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#0072ce">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="@yield('meta-description', 'ARC ONE（アークワン）は中小企業向けホームページ制作サービスです。まだ知られていない価値を、未来の出会いへ。高品質・低価格・短納期で本物のホームページをお届けします。')">

    <title>@yield('title', 'ARC ONE（アークワン）｜ホームページ制作')</title>

    <link rel="canonical" href="@yield('canonical', url()->current())">

    @hasSection('structured-data')
        @yield('structured-data')
    @endif

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

    @fonts

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-arcone-surface text-arcone-ink antialiased overflow-x-hidden">
    @yield('content')
</body>
</html>
