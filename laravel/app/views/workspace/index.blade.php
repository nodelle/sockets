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

    <main class="container-fluid workspace-container" ng-controller="WorkspaceController">
        <aside class="col-sm-2">
            <nav class="well">
                <ul>
                    <li ng-repeat="ws in workspaces">
                        <a href="/workspace/{% ws.id %}">{% ws.name %}</a>
                    </li>
                </ul>
            </nav>
            <nav class="well">
                <ul>
                    <li>
                        <a ng-click="newNode()">Create New Node</a>
                    </li>
                </ul>
            </nav>
        </aside>
        <div class="col-sm-10 workspace" jqyoui-droppable="{onDrop: 'drop(e, ui)'}" data-drop="true">
            <div class="node" style="left: {% node.left %}px; top: {% node.top %}px;" data-drag="true" data-id="{% node.id %}" jqyoui-draggable ng-repeat="node in workspace.nodes">
                <p>{% node.name %}</p>
                <p>{% node.content %}</p>
            </div>
        </div>
    </main>

    @include('partials.footer')
    <script src="http://autobahn.s3.amazonaws.com/js/autobahn.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/angular/angular.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/angular-dragdrop/src/angular-dragdrop.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/angular/directives/nodelle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/angular/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/angular/controllers/workspace-controller.js') }}"></script>
</body>
</html>