nodelleApp.controller('WorkspaceController', function($scope, $http, nodelle)
{
    $scope.workspaces = workspaces;

    $scope.workspace = workspace;

    nodelle.connection('ws://192.168.22.10:8080', function() {
            console.log('connection opened');
        },
        function() {
            console.warn('WebSocket connection closed');
        }
    );

    setTimeout(function() {
        nodelle.subscribe('nodelle.workspace.' + $scope.workspace.id, function(topic, data) {
            if (data.event == 'node.new') {
                $scope.workspace.nodes.push({
                    id: data.id,
                    name: data.name,
                    content: data.content,
                    left: data.left,
                    top: data.top
                });
            }

            if (data.event == 'node.update') {
                angular.forEach($scope.workspace.nodes, function(node){
                    if (node.id == data.id) {
                        var node = $('.workspace-container').find("[data-id='"+data.id+"']");
                        node.animate({top: data.top, left: data.left}, 500);
                    }
                });
            }
        });
    }, 500);

    $scope.newNode = function()
    {
        $http.post('/api/workspace/' + $scope.workspace.id + '/new-node').success(function()
        {
            console.log('new node');
        });
    }

    $scope.drop = function(e, ui)
    {
        var id = angular.element(ui.draggable[0]).data('id');

        $http.post('/api/workspace/' + $scope.workspace.id + '/node/' + id + '/update', {
            id: id,
            left: ui.position.left,
            top: ui.position.top
        }).success(function()
        {
            console.log('updated node');
        });
    }

});