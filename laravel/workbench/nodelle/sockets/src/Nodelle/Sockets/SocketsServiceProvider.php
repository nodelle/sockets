<?php namespace Nodelle\Sockets;

use Illuminate\Support\ServiceProvider;

class SocketsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind('nodelle', function($app)
        {
            return new Nodelle();
        });

		$this->app['nodelle.server.start'] = $this->app->share(function()
        {
            return new NodelleServerManager();
        });

        $this->commands('nodelle.server.start');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
