<?php
    $settings = \App\Models\Settings::where('settings_id', 1)->first();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <title>{{ ($settings && $settings->site_title) ? $settings->site_title : 'Kotha - Modern Blog PHP Script'}}</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet"/>
    <script src="{{ asset('/js/app.js') }}" defer></script>

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

</head>
<body>

    @inertia

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>

    @if($settings && $settings->google_analytics_id)
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$settings->google_analytics_id}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ $settings->google_analytics_id }}');
    </script>
    @endif

</body>
</html>
