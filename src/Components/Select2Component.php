<?php

namespace JackBayliss\LivewireSelect2\Components;

use Illuminate\Support\Str;
use JackBayliss\LivewireSelect2\Exceptions\NoAttributeException;
use Livewire\Component;

class Select2Component extends Component
{
    public ?string $id = null;

    public ?string $name = null;
    public ?string $model = null;

    public ?array $options = [];

    public bool $multiple = false;

    public ?string $onchange;

    protected $listeners = ['select2Change'];

    /**
     * @throws NoAttributeException
     */
    public function mount()
    {

        $this->id = Str::uuid();
        if (! isset($this->options) || count($this->options) == 0 ) {
            throw new NoAttributeException('You must specify an options array to the select2 component and it must include more than 0 item/s!');
        }
        if (! isset($this->onchange)) {
            throw new NoAttributeException('You must specify an on change emit method for select2 to work as expected!');
        }
    }

    /**
     * Calls the users defined onchange emit function
     * @param string $id
     * @param $data
     * @return void
     */
    public function select2Change($data)
    {
        if (isset($this->onchange)) {
            $this->dispatch($this->onchange, ['name' => $this->name, 'data' => $data]);
        }
    }

    public function render()
    {
        $this->dispatch('livewire-select2-init', $this->id);

        return view('livewire-select2::components.select2');
    }
}
