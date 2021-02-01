<?php

namespace Cms\Cmspackage\Tests;

use Tests\TestCase;
use Cms\Cmspackage\CmsServiceProvider;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
         $this->loadMigrationsFrom(__DIR__.'/./../publishable/database/migrations');
    }

    protected function getPackageProviders($app)
    {
        return [
        CmsServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}