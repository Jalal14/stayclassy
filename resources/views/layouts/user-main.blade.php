<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('images')}}/{{$icon}}" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css')}}/stylesheet.css">
    <link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
    @yield('style')
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark justify-content-center navbar-dark fixed-top" id="big-screen">
        <ul class="navbar-nav nav-links m-auto" id="map-locator">
            @forelse($categories as $category)
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.list', [$category->name])}}">{{$category->name}}</a>
            </li>
            @empty
            @endforelse
        </ul>
        <ul class="navbar-nav brand-link m-auto">
            <li class="navbar-nav">
                <a class="navbar-brand" href="{{route('home.index')}}">StayClassy</a>
            </li>
        </ul>
        <ul class="navbar-nav nav-links m-auto">
            @forelse($types as $type)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.list', [$type->name])}}">{{$type->name}}</a>
                </li>
            @empty
            @endforelse
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.newArrival')}}">New arrivals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.offers')}}">Offers</a>
            </li>
            <li class="nav-item">
                <form action="{{route('home.search')}}">
                    <div class="input-group">
                        <input type="text" id="search-box" class="form-control" name="key">
                        <input type="submit" id="submit-button">
                        <div class="input-group-append">
                            <button type="button" class="btn input-group-text" id="search-icon"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </li>
        </ul>
    </nav>
    <nav class="navbar navbar-expand-md bg-dark justify-content-center navbar-dark fixed-top d-xl-none d-lg-none">
        <ul class="navbar-nav brand-link m-auto">
            <li class="navbar-nav">
                <a class="navbar-brand" href="{{route('home.index')}}">StayClassy</a>
            </li>
        </ul>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav nav-links">
                @forelse($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.list', [$category->name])}}">{{$category->name}}</a>
                    </li>
                @empty
                @endforelse
                @forelse($types as $type)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.list', [$type->name])}}">{{$type->name}}</a>
                    </li>
                @empty
                @endforelse
                <li class="nav-item">
                    <a class="nav-link ml-auto" href="{{route('home.newArrival')}}">New arrivals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.offers')}}">Offers</a>
                </li>
                <li class="nav-item">
                    <form action="{{route('home.search')}}">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="key">
                            <div class="input-group-append">
                                <button type="submit" class="btn input-group-text"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>  
    </nav>

    
    @yield('content')

    <div class="footer">
        <div class="container-fluid">
            <div class="row policy">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 footer-item">
                    <div class="footer-content">
                        <div class="break-speech text-uppercase">
                            <a href="{{$quality->column}}"><h6>{{$quality->heading}}</h6></a>
                        </div>
                        <div class="break-speech">
                            <a href="{{$quality->column}}">{{$quality->title}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 footer-item">
                    <div class="footer-content">
                        <div class="break-speech text-uppercase">
                            <a href="{{$return->column}}"><h6>{{$return->heading}}</h6></a>
                        </div>
                        <div class="break-speech">
                            <a href="{{$return->column}}">{{$return->title}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 footer-item">
                    <div class="footer-content">
                        <div class="break-speech text-uppercase">
                            <a href="{{$shipping->column}}"><h6>{{$shipping->heading}}</h6></a>
                        </div>
                        <div class="break-speech">
                            <a href="{{$shipping->column}}">{{$shipping->title}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="contact">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 footer-item">
                    <div class="footer-content">
                        <div class="break-speech text-uppercase">
                            <a href="{{$service->column}}">{{$service->heading}}</a>
                        </div>
                        <div class="break-speech">
                            <a href="{{$service->column}}">{{$service->title}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 footer-item">
                    <div class="footer-content">
                        <div class="break-speech text-uppercase">
                            {{$contact->heading}}
                        </div>
                        <div class="break-speech">
                            {{$contact->number}}
                        </div>
                        <div>
                            {{$contact->email}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 footer-item">
                    <div class="footer-content">
                        <div class="break-speech text-uppercase">
                            <a href="{{$policy->column}}">{{$policy->heading}}</a>
                        </div>
                        <div class="break-speech">
                            <a href="{{$policy->column}}">{{$policy->title}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 footer-item">
                    <div class="footer-content">
                        <div class="break-speech text-uppercase">
                            <a href="{{$about->column}}">{{$about->heading}}</a>
                        </div>
                        <div class="break-speech">
                            <a href="{{$about->column}}">{{$about->title}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('js')}}/script.js"></script>
    @yield('script')
</body>
</html>