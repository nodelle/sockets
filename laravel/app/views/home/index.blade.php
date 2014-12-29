<h1 class="page-header">Nodelle Test</h1>

<script type="text/javascript" src="{{ asset('js/wampy/src/wampy.js') }}"></script>
<script type="text/javascript">
    var ws = new Wampy('ws://192.168.22.10:8080');

    ws.subscribe('kittensCategory', function (data) { console.log('New article published to category "' + topic + '" : ' + data.title); })
</script>