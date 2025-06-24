<?php

use Illuminate\View\ViewException;
use JackBayliss\LivewireSelect2\Components\Select2Component;
use JackBayliss\LivewireSelect2\Exceptions\NoAttributeException;
use Livewire\Livewire;

it('can test', function () {
    expect(true)->toBeTrue();
});

it('it works as expected when passing in the correct options', function () {
    expect(Livewire::test(Select2Component::class, ['options' => ['1', '2', '3'], 'onchange' => 'changeMethod'])
        ->get('options'))->toMatchArray(['1', '2', '3']);
});

it('on change method passes as expected', function () {
    expect(Livewire::test(Select2Component::class, ['options' => ['1', '2', '3'], 'onchange' => 'changeMethod'])
        ->get('onchange'))->toEqual('changeMethod');
});

it('throws exception if options is an empty array', function () {
    try {
        Livewire::test(Select2Component::class, [
            'options' => [],
            'onchange' => 'changeMethod',
        ]);
        $this->fail('Expected NoAttributeException not thrown');
    } catch (ViewException $e) {
        expect($e->getPrevious())->toBeInstanceOf(NoAttributeException::class);
    }
});

it('throws exception if onchange is null', function () {
    try {
        Livewire::test(Select2Component::class, [
            'options' => ['1', '2', '3'],
            'onchange' => null,
        ]);
        $this->fail('Expected NoAttributeException not thrown');
    } catch (ViewException $e) {
        expect($e->getPrevious())->toBeInstanceOf(NoAttributeException::class);
    }
});

it('displays correctly with basics', function () {
    expect(Livewire::test(Select2Component::class, ['options' => ['Car', 'Bike', 'Bus'], 'onchange' => 'changeMethod']))->assertSee('Car')->assertSee('Bike')->assertSee('Bus');
});

it('dispatches correctly', function () {
    expect(Livewire::test(Select2Component::class, ['name' => 'dispatchTest', 'options' => ['Car', 'Bike', 'Bus'], 'onchange' => 'changeMethod']))->call('select2Change', 'Car')->assertDispatched('changeMethod', function ($name, $params) {
        return isset($params[0]['name'],$params[0]['data']) && $params[0]['name'] == 'dispatchTest' && $params[0]['data'] == 'Car';
    });
});
it('class param passes through', function () {
    expect(Livewire::test(Select2Component::class, ['options' => ['Car', 'Bike', 'Bus'], 'onchange' => 'changeMethod', 'class' => 'test-class'])->get('class'))->toEqual('test-class');
});
it('multiple is displayed when setting it', function () {
    expect(Livewire::test(Select2Component::class, ['options' => ['Car', 'Bike', 'Bus'], 'onchange' => 'changeMethod', 'multiple' => true]))->assertSee('multiple');
});
