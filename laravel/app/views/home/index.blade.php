<h1 class="page-header">Nodelle Test</h1>
<script src="http://autobahn.s3.amazonaws.com/js/autobahn.min.js"></script>
<script>
    var conn = new ab.Session('ws://192.168.22.10:8080',
        function() {
            conn.subscribe('{"workspace": 1, "user": 1, "token": "gaisuhfih1298764"}', function(topic, data) {
                console.log('New article published to category "' + topic + '" : ' + data.title);
            });
        },
        function() {
            console.warn('WebSocket connection closed');
        },
        {'skipSubprotocolCheck': true}
    );
</script>