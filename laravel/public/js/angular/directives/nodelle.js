angular.module('nodelle', []);

angular.module('nodelle').factory('nodelle', function() {

    var nodelle = {};

    nodelle.publish = function(topic, data) {
        if (typeof nodelle.conn === 'undefined') {
            throw new Error('You must create a new connection before trying to publish to a topic.');
        }

        nodelle.conn.publish(topic, data);
    }

    nodelle.subscribe = function(topic, callback) {
        nodelle.conn.subscribe(topic, callback);
    }

    /**
     * Create a new web socket connection.
     *
     * @param string socket
     * @param object workspaces
     */
    nodelle.connection = function(socket, onOpen, onClose) {
        var conn = new ab.Session(socket, onOpen, onClose,
            {'skipSubprotocolCheck': true}
        );

        nodelle.conn = conn;
    }

    return nodelle;

});