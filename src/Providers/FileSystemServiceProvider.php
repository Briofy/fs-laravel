<?php

namespace Briofy\FileSystem\Providers;

use Briofy\FileSystem\Repositories\AttachmentRepository;
use Briofy\FileSystem\Repositories\IAttachmentRepository;
use Illuminate\Support\ServiceProvider;

class FileSystemServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../Config/briofy-filesystem.php', 'briofy-filesystem');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../Config/briofy-filesystem.php' => config_path('briofy-filesystem.php'),
            ], 'briofy-filesystem-config');
        }

        if ($this->app->runningInConsole() && config('briofy-filesystem.attachments.active')) {
            $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        }

        if (config('briofy-filesystem.attachments.active')) {
            $this->app->bind(IAttachmentRepository::class, AttachmentRepository::class);
        }
    }
}
