var Socketier = function(options) {

    /**
     * Create a new websocket
     *
     * @param options
     * @returns {WebSocket}
     */
    this.connection = function(options) {
        return new WebSocket(options);
    }

    /**
     * Set up the socketier options
     *
     * @param options
     */
    this.options = function(options) {
        if (options.socket.length) {
            this.socket = this.connection(options.socket);
        }
    }

    /**
     * Set up the socketier
     *
     * @param options
     */
    this.init = function(options) {
        if (typeof options === 'object') {
            this.options(options);
        } else {
            this.socket = this.connection(options);
        }
    }

    this.init(options);

    /**
     * Run the provided callback when the socket opens
     *
     * @param callback
     */
    this.onOpen = function(callback) {
        this.socket.onopen = callback;
    }

    this.onError = function(callback) {
        this.socket.onerror = callback;
    }
};