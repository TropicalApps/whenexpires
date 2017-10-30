<?php
namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

/**
 * RepositoryServiceProvider
 *
 * Sets up and binds all the application repositories
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register repositories
     */
    public function register()
    {
        $this->registerDomainRepository();
    }

    /**
     * Register Domain repository
     */
    private function registerDomainRepository()
    {
        $this->app->bind('App\Repositories\Domain\DomainRepository', 'App\Repositories\Domain\ApiDomainRepository');
    }
}
