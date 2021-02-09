<?php 

namespace cms\cmspackage;
use Illuminate\Support\ServiceProvider;
use Artisan;
use Illuminate\Support\Facades\Blade;
use cms\cmspackage\View\Components\Backeend\CmsAdd;
use cms\cmspackage\View\Components\Backeend\CmsEdit;
use cms\cmspackage\View\Components\Backeend\CmsList;
use cms\cmspackage\View\Components\Frontend\CmsPage;

class CmsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/./../publishable/database/migrations');
        $this->loadViewsFrom(__DIR__.'/./../resources/views','cms');
        $this->loadViewsFrom(__DIR__.'/./../resources/views/Frontend','cms_frontend');
        $this->publishes([
        __DIR__.'/./../resources/views/Backend' => resource_path('views/backend/cms/'),
        'views']);
        $this->publishes([
        __DIR__.'/./../resources/views/Frontend' => resource_path('views/frontend/cms/'),
        'views']);

        $this->mergeConfigFrom(__DIR__.'/../config/constant.php', 'cms');

        $this->publishes([
        __DIR__.'/../config/constant.php' => config_path('cms.php'),
        ]);

        $this->publishes([
            __DIR__.'/./../resources/lang' => resource_path('lang'),
        ],'lang');

        $this->app['router']->namespace('cms\cmspackage\Http\Controllers\Backend')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/Routes/cms.php');
                });

        $this->app['router']->namespace('cms\cmspackage\Http\Controllers\Frontend')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/Routes/cmspage.php');
                });

        $this->loadTranslationsFrom(__DIR__.'/./../resources/lang', 'cms_lang');

        $this->publishes([
        __DIR__.'/./../resources/lang/en' => resource_path('lang/en/cms/'),
        ]);
        $this->publishes([__DIR__.'/./../public' => public_path('cms/'),
            ], 'asset');

        $this->publishes([__DIR__.'/./../publishable/database/migrations' => database_path('migrations'),
            ], 'migration');

        $this->publishes([__DIR__.'/Routes/cms.php' => 'routes/cms.php',
            ], 'route');

        $this->publishes([__DIR__.'/http/controllers/Backend' => app_path('http/controllers/backend/cms/'),
            ], 'controller');

        $this->publishes([__DIR__.'/http/controllers/Frontend' => app_path('http/controllers/frontend/cms/'),
            ], 'controller');

        $this->publishes([__DIR__.'/Models' => app_path('Models/cms/'),
            ], 'Models');

        $this->publishes([__DIR__.'/Helpers' => 'app/Helpers/',
        ], 'helpers');

        $this->loadViewComponentsAs('courier', [
            CmsAdd::class,
            CmsEdit::class,
            CmsList::class,
            CmsPage::class
        ]);
        Artisan::call('vendor:publish --tag="asset"');

    }
    public function register()
    {
        
    }
}