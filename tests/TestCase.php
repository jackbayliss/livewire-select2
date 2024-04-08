<?php

namespace JackBayliss\LivewireSelect2\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use JackBayliss\LivewireSelect2\LivewireSelect2ServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'JackBayliss\\LivewireSelect2\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireSelect2ServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_livewire-select2_table.php.stub';
        $migration->up();
        */
    }
}
