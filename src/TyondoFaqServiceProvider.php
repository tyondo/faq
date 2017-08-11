<?php

namespace Tyondo\Faq;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Tyondo\Faq\Commands\Install;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Tyondo\Faq\Commands\Publish\Migrations;
use Tyondo\Faq\Commands\Publish\Views;
use Tyondo\Faq\Commands\Publish\Assets;
use Tyondo\Faq\Commands\Publish\Config;
use Tyondo\Faq\Commands\Publish\Packages;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class TyondoFaqServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    protected $providers = [
        'Collective\Html\HtmlServiceProvider',
        'Unisharp\Laravelfilemanager\LaravelFilemanagerServiceProvider',
        'Intervention\Image\ImageServiceProvider'
    ];
    protected $aliases = [
        'Form' => 'Collective\Html\FormFacade',
        'Html' => 'Collective\Html\HtmlFacade',
        'TyondoFaq' => 'Tyondo\Faq\TyondoFaq',
        'Image' => 'Intervention\Image\Facades\Image',
    ];
    protected $publishableDir = __DIR__ . '/../Publishable/';
    protected $basePath = __DIR__;

    /**
     * List of commands.
     *
     * @var array
     */
    protected $commands = [
	Install::class,        
	Views::class,
	Migrations::class,
	Assets::class,
	Config::class,
    Packages::class,
    ];

    /**
     * Configuration files.
     */
    private function registerConfigs()
    {
        $configPath = $this->publishableDir.'Config/tfaq.php';
        // Allows any modifications from the published config file to be seamlessly merged with default config file
        $this->mergeConfigFrom($configPath, 'tfaq');
    }

    /**
     * View files.
     */
    private function publishResources()
    {

        $publishable = [
            'public' => [
                "$this->publishableDir./Public/faq/" => public_path('vendor/tyondo/faq'),
            ],
            'migrations' => [
                "$this->basePath/Database/migrations" => database_path('migrations'),
            ],
            'seeds' => [
                "$this->publishableDir./Database/seeds/" => database_path('seeds'),
            ],
            'lang' => [
                "$this->publishableDir./Resources/" => base_path('resources/views/vendor/tyondo/faq'),
            ],
            'views' => [
                "$this->publishableDir./Resources/views/" => base_path('resources/views/vendor/tyondo/faq/views'),
            ],
            'config' => [
                "$this->publishableDir/Config/tfaq.php" => config_path('tfaq.php'),
            ],
        ];

        foreach ($publishable as $group => $paths) {
            $this->publishes($paths, $group);
        }
    }

    /**
     * Migration files.
     */
    private function handleMigrations()
    {
        // Load the migrations...
        $this->loadMigrationsFrom("$this->basePath/Database/migrations");
    }

    /**
     * Command files.
     */
    private function handleCommands()
    {
        // Register the commands...
        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        }
    }

    /**
     * Register factory files.
     *
     * @param  string  $path
     * @return void
     */
    protected function registerEloquentFactoriesFrom($path)
    {
        $this->app->make(EloquentFactory::class)->load($path);
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->registerConfigs();
        $this->handleMigrations();
        $this->publishResources();
        $this->handleCommands();

	// Load the views...
        $this->loadViewsFrom($this->publishableDir.'Resources/views', 'TyondoFaq');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $loader = AliasLoader::getInstance();
        $router = $this->app['router'];

        // Register factories...
        $this->registerEloquentFactoriesFrom($this->publishableDir.'Database/factories');

        // Register service providers...
        $this->registerServiceProviders();
        // Register facades...
        $this->registerAliases();

        // Register middleware...

        $this->app->singleton('TyondoFaq', function() {
            return new TyondoFaq();
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
    /**
     * @return void
     */
    private function registerServiceProviders()
    {
        foreach ($this->providers as $provider)
        {
            $this->app->register($provider);
        }
    }
    /**
     * @return void
     */
    private function registerAliases()
    {
        $loader = AliasLoader::getInstance();
        foreach ($this->aliases as $key => $alias)
        {
            $loader->alias($key, $alias);
        }
    }
}
