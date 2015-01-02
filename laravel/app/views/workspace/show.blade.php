<h1 class="page-header">{{ $user->full_name }} - {{ $workspace->name }}</h1>

<div class="container-fluid">

    <aside class="col-sm-2">
        <nav class="well">
            <ul>
                @foreach ($user->workspaces as $ws)
                    <li><a href="{{ route('workspace.show', [$ws->id]) }}">{{ $ws->name }}</a></li>
                @endforeach
            </ul>
        </nav>
    </aside>

    <main class="col-sm-10" style="position: relative;">

    </main>

</div>

@section('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://autobahn.s3.amazonaws.com/js/autobahn.min.js"></script>
<script>
    var conn = new ab.Session('ws://192.168.22.10:8080',
        function() {

            workspaces.forEach(function(ws) {
                conn.subscribe('nodelle.workspace.' + ws.id, function(topic, data) {
                    if (typeof data !== 'object') {
                        data = JSON.parse(data);
                    }

                    if (data.event == 'node.update') {
                        $('.node').animate({top: data.top, left: data.left}, 500);
                    }
                });
            });

        },
        function() {
            console.warn('WebSocket connection closed');
        },
        {'skipSubprotocolCheck': true}
    );

    $('button.test').click(function()
    {
       conn.publish('nodelle.workspace.1',[{'event': 'node.update', 'top': 20, left: 100}]);
    });

</script>
@endsection