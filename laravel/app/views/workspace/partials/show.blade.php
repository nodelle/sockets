<section class="col-sm-10">

</section>
<aside class="col-sm-2 well">
    <ul class="nav">
        <li><a href="{{ route('nodes.create', [$workspace->id]) }}" class="new-node">New Node</a></li>
    </ul>
</aside>

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