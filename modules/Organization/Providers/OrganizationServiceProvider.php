<?php

namespace Modules\Organization\Providers;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class OrganizationServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadNavigationLinks($events);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('organization.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'organization'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/organization');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/organization';
        }, \Config::get('view.paths')), [$sourcePath]), 'organization');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/organization');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'organization');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'organization');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
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



    private function loadNavigationLinks(Dispatcher $events) : void
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            if (Auth::guard('organization')->check()) {
//                $event->menu->add('Skills');
                $event->menu->add([
                    'text' => 'Skills',
                    'url' => \route('skills.listing'),
                    'icon' => 'rocket',
                ]);
                $event->menu->add([
                    'text' => 'Trainer',
                    'url' => \route('organization.trainers'),
                    'icon' => 'user-secret',
                ]);
                $event->menu->add([
                    'text' => 'Learner',
                    'url' => \route('organization.learners'),
                    'icon' => 'users',
                ]);
            }
        });
    }
}
