<!doctype html>
<html lang="{{Lang::getLocale()}}">
<head>
    <title>{{$metaTags->title}}</title>

    <meta name="description" content="{{$metaTags->description}}">
    <meta name="keywords" content="{{$metaTags->keywords}}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=1, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{asset('assets/site/font-awesome/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/site/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/fonts/SanFrancisco/san_francisco.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/fonts/artful_beauty/artful_beauty.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/owlcarousel/css/owl.carousel.css')}}">
</head>
<body>

@yield('body')

</body>
</html>