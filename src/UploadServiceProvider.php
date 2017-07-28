<?php
namespace Lewisliang82\CNUpload\Upload;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class UploadServiceProvider extends LaravelServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {

        $this->handleConfigs();
        $this->handleViews();
        $this->handleRoutes();
        $this->handleRecources();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        // Bind any implementations.

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {

        return [];
    }

    private function handleConfigs() {

        $configPath = __DIR__ . '/../config/cnupload.php';

        $this->publishes([$configPath => config_path('cnupload.php')],'config');

        $this->mergeConfigFrom($configPath, 'cnupload');
    }

    private function handleViews() {

        $this->loadViewsFrom(__DIR__.'/../views','cnupload');

        $this->publishes([__DIR__.'/../views' => base_path('resources/views/cnupload')],'view');
    }

    private function handleRoutes() {

        include __DIR__.'/../routes.php';
    }

    private function handleRecources(){

        $this->publishes([
            __DIR__ . '/../resources/public/' => public_path('cnupload')
        ],'cnupload');
    }
}
