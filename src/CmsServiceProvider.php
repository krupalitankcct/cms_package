<?php 

namespace Cms\Cmspackage;
use Illuminate\Support\ServiceProvider;
use Artisan;
use Illuminate\Support\Facades\Blade;
use Cms\Cmspackage\View\Components\CmsAdd;
use Cms\Cmspackage\View\Components\CmsEdit;
use Cms\Cmspackage\View\Components\CmsList;
use Cms\Cmspackage\View\Components\CmsPage;

class CmsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/./../publishable/database/migrations');

        $this->loadViewsFrom(__DIR__.'/./../resources/views','cms');

        $this->mergeConfigFrom(__DIR__.'/../config/constant.php', 'cms');

        $this->publishes([
        __DIR__.'/./../resources/views' => resource_path('views/vendor/cms'),
        'views']);
        
        $this->publishes([
        __DIR__.'/../config/constant.php' => config_path('cms.php'),
        ]);

        $this->app['router']->namespace('Cms\Cmspackage\Http\Controllers\Backend')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/Routes/cms.php');
                });

        $this->app['router']->namespace('Cms\Cmspackage\Http\Controllers\Frontend')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/Routes/cmspage.php');
                });

        $this->loadTranslationsFrom(__DIR__.'/./../resources/lang', 'cms_lang');

        
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