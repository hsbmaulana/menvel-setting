<?php

namespace Menvel\Setting;

use Menvel\Repository\RepositoryServiceProvider as ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $map =
    [
        \Menvel\Setting\Contracts\Repository\ISettingRepository::class => \Menvel\Setting\Repositories\Eloquent\SettingRepository::class,
    ];

    /**
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}