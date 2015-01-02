nodelleApp.controller('DashboardController', function($scope, nodelle)
{
    $scope.user = user;

    $scope.workspaces = workspaces;

    nodelle.connection('ws://192.168.22.10:8080', function() {
            console.log('connection opened');
        },
        function() {
            console.warn('WebSocket connection closed');
        }
    );

    setTimeout(function() {
        angular.forEach($scope.workspaces, function(ws) {
            nodelle.subscribe('nodelle.workspace.' + ws.id, function(topic, data) {
               console.log(topic, data);
            });
        });
    }, 500);
});