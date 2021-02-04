Daynamic content management packages 
Run bellow command to install

composer require cms/cmspackage

1.php artisan migrate

2.this route to view your cms page list your project directory admin/cms_list

### Configuration

If you want to change these options, you'll have to publish the `config` file.
    php artisan vendor:publish --provider="Cms\Cmspackage\CmsServiceProvider" --tag="config"
This will give you a `cms.php` config file in which you can make the changes.

To make your life easy, the package also includes a ready to use `migration` which you can publish by running:
    php artisan vendor:publish --provider="Cms\Cmspackage\CmsServiceProvider" --tag="migrations"
    
Then run bellow command to publish config and resource files

If you want to change these options, you'll have to publish the `views` file.
php artisan vendor:publish --provider="Cms\Cmspackage\CmsServiceProvider" --tag="views"

php artisan vendor:publish --provider="Cms\Cmspackage\CmsServiceProvider" --tag="lang"
