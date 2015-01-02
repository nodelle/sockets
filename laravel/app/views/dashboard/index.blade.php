<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"/>
</head>
<body ng-app="nodelleApp">
    <header class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home.index') }}">Nodelle</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav"></ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>

    <main class="container-fluid" ng-controller="DashboardController">

    </main>

    @include('partials.footer')
    <script src="http://autobahn.s3.amazonaws.com/js/autobahn.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/angular/angular.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/angular/directives/nodelle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/angular/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/angular/controllers/dashboard-controller.js') }}"></script>
</body>
</html>