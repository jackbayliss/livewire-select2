<?php

namespace JackBayliss\LivewireSelect2;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use JackBayliss\LivewireSelect2\Components\Select2Component;
use JackBayliss\LivewireSelect2\Exceptions\LivewireRequiredException;
use Livewire\Livewire;

class LivewireSelect2ServiceProvider extends ServiceProvider
{
    /**
     * @throws LivewireRequiredException
     */
    public function register()
    {
        $this->callAfterResolving(BladeCompiler::class, function () {
            if (class_exists(Livewire::class)) {
                Livewire::component('select-2', Select2Component::class);
            } else {
                throw new LivewireRequiredException('Livewire is required to use this package, please ensure Livewire is installed!');
            }
        });

    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'livewire-select2');
    }
}
