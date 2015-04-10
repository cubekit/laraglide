<?php namespace Cubekit\Laraglide;

use Illuminate\Support\ServiceProvider;

class LaraglideServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    public function boot()
    {
        require_once __DIR__ . '/helpers.php';
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        app()->bind(
            'Cubekit\Laraglide\Contracts\FilesystemsProvider',
            'Cubekit\Laraglide\DisksProvider'
        );

        app()->singleton('laraglide', function()
        {
            $disksProvider = app()->make('Cubekit\Laraglide\Contracts\FilesystemsProvider');

            return ServerFactory::create([
                'source'            => $disksProvider->getSourceFilesystem(),
                'cache'             => $disksProvider->getCacheFileSystem(),
                'cache_path_prefix' => config('laraglide.disks.cache_path_prefix')
            ]);
        });

    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}
