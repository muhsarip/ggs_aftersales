<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        @yield('title') - Aftersales Good Gaming Shop
    </title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @yield('source')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }

        .has-search .form-control {
            padding-left: 2.375rem;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }
    </style>
</head>


<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div>
            <div style="width: 50px;height:50px;float:left"><img src="/images/logo-ggs.png" class="img-fluid" alt="">
            </div>
        </div>
        <a class="navbar-brand" href="{{url('/admin')}}">

            <div class="ml-2">Good
                Gaming Shop</div>
            <div class="clear"></div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/distributors')}}">Data Distributor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/warranties')}}">List Warranty & Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/settings')}}">Settings</a>
                </li>
            </ul>
            <div class="float-right">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <span class="text-danger">{{ __('Log out') }}</span>
                    </x-dropdown-link>
                </form>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:30px;">
        @yield('content')
    </div>
    <div class="" style=" margin-top:30px;">
        @yield('content-dashboard')
    </div>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <div style="width: 100px;height:100px" class="mb-5 mx-auto">
            <img src="/images/logo-ggs.png" class="img-fluid" alt="">
        </div>
        2021 {{config('app.name')}} - <a href="https://goodgamingshop.com">Good Gaming Shop</a>
    </div>

    @yield('script')

</body>

</html>