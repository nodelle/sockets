<h1 class="page-header">{{ $user->full_name }}</h1>

<div class="container-fluid">

    <aside class="col-sm-2">
        <nav class="well">
            <ul>
                @foreach ($user->workspaces as $workspace)
                    <li><a href="{{ route('workspace.show', [$workspace->id]) }}">{{ $workspace->name }}</a></li>
                @endforeach
            </ul>
        </nav>
    </aside>
    <div class="col-sm-10"></div>

</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://autobahn.s3.amazonaws.com/js/autobahn.min.js"></script>
<script>
    var conn = new ab.Session('ws://192.168.22.10:8080',
        function() {

            @foreach ($user->workspaces as $workspace)
                conn.subscribe('nodelle.workspace.{{ $workspace->id }}', function(topic, data) {
                    console.log(topic, data);
                });
            @endforeach

        },
        function() {
            console.warn('WebSocket connection closed');
        },
        {'skipSubprotocolCheck': true}
    );

    $('button.test').click(function()
    {
       conn.publish('nodelle.workspace.1',[{'event': 'node.1.update', 'top': 20, left: 100}]);
    });

</script>