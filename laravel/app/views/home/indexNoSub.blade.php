<h1 class="page-header">Nodelle Test</h1>
<p>test</p>
<script src="http://autobahn.s3.amazonaws.com/js/autobahn.min.js"></script>
<script>
    var conn = new ab.Session('ws://192.168.22.10:8080',
        function() {
            console.log('connected');
        },
        function() {
            console.warn('WebSocket connection closed');
        },
        {'skipSubprotocolCheck': true}
    );
</script>