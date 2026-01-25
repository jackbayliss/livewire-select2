# Simple to use Livewire component for Select2

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jackbayliss/livewire-select2.svg?style=flat-square)](https://packagist.org/packages/jackbayliss/livewire-select2)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/jackbayliss/livewire-select2/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/jackbayliss/livewire-select2/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jackbayliss/livewire-select2/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/jackbayliss/livewire-select2/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jackbayliss/livewire-select2.svg?style=flat-square)](https://packagist.org/packages/jackbayliss/livewire-select2)

Easy to use Livewire component specifically for Select2. 

Supports: 
- Laravel 10
- Laravel 11
- Laravel 12

## Installation

You can install the package via composer:
This currently works on Livewire V3 and V4

```bash
composer require jackbayliss/livewire-select2
```
## Initial Setup
First of all, ensure you install jQuery, and select2- for example, the below. You can also install these via npm and import it into your app.js. 
Main thing is ensuring the scripts are included anywhere you want select2 to work.
```html
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
```
## Usage
The package is quite straight forward, and can be used directly in a **LIVEWIRE** component, see below the basic usage
```html
<livewire:select-2 :options="$this->vehicles" onchange="triggerMyFunction" name="vehicles" model="Vauxhall" multiple/>
```

## Component parameters
#### options (required) - array
The select2 component expects an array of options, this can be for example - you must pass this into the options param as per the above.
```php
public $vehicles = ['Ford','Vauxhall','Seat'];
```

#### onchange (required) - string
The select2 component expects a string of the listener function to call. For example, `triggerMyFunction`- you can see how to do this below.
The onchange function, expects one param. The param returned from this component is an array of data - which includes the following:
##### Name - The name param you passed in, this can be used in your custom function if required - this is null if not supplied.
##### Data - This is the values returned from the select2 change, if you have not set the multiple param, this is a string- otherwise its an array. Please see https://github.com/jackbayliss/livewire-select2?tab=readme-ov-file#base-component if theres any confusion.
> [!IMPORTANT]  
> Ensure your function includes one parameter, for example `triggerMyFunction($select2)`

#### name (not required) - string
You can pass this to your component if you need specific logic based on the name.
#### model (not required) - string
You can pass an option value in as model, this then auto selects the option- useful in a case where a selection has already been made.
```html
<livewire:select-2 :options="$this->vehicles" onchange="callVehicles" name="vehicles" model="Vauxhall"/>

```
#### How to add a custom class 
This can apply a custom CSS class to the Livewire Select2 component, see below for an example

```css
<style>
        .example{
            width: 50% !important;
        }
</style>
```

```html
<livewire:select-2 :options="$this->vehicles" onchange="triggerMyFunction" name="vehicles" model="Vauxhall" multiple :class="'example'"/>
```



#### multiple (not required) - blank param    
> [!TIP]
> If this is used, the data will be returned as an array, rather than a string.

This allows you to select multiple options, as per select2 usually does and should be used like the following:
```html
<livewire:select-2 :options="$this->vehicles" onchange="callVehicles" name="vehicles" multiple/>
```

## Creating a Listener
> [!TIP]
> A listener is required for the onchange param, in order to create a listener, you should do the below. This means, whenever the select2 component is changed - ie an option clicked, it will call the function you defined, and you can do as you wish with the logic.

```html
<livewire:select-2 :options="$this->vehicles" onchange="triggerMyFunction" name="vehicles"/>
```


```php

    protected $listeners = ['triggerMyFunction'];

    public function triggerMyFunction($data){
        dd($data['name'],$data['data']);
    }

```
> [!IMPORTANT]  
> Whatever string you pass to the onchange param, ensure you create a listener and function like the above. **Your function must accept one parameter, this is the array of data returned which includes name and data, name being the name you set on the component (if you did set one) and the data ie the value selected.**


## Example / How it works in practice
####  Base component
I have an initial component, which I am calling as <livewire:test> in my blade. The component is below:
```php
<?php

namespace App\Livewire;

use Livewire\Component;
class Test extends Component
{

    public string $selectedVehicle = 'N/A';
    public array $vehicles = ['Ford','Vauxhall','Seat'];

    protected $listeners = ['callVehicles'];
    
    // DO YOUR OWN LOGIC...
    public function callVehicles($output){
            if(in_array($output['data'],$this->vehicles)){
                $this->selectedVehicle = $output['data'];
            }
    }
    public function render()
    {
        return view('livewire.test');
    }
}

```
####  The view, is basic and looks like the below - main thing to take away is how the component is used:
```html
<div>
<livewire:select-2 :options="$this->vehicles" onchange="callVehicles" name="vehicles"/>
{{ $this->selectedVehicle }}
</div>



```
You then get the below...

![test-component](https://github.com/jackbayliss/livewire-select2/assets/13621738/1fb1dfaf-cc1d-44b5-82a5-4cff50e7b679)

## Stuck?
I have an example project setup below.. you can simply download it and composer install. 


https://github.com/jackbayliss/livewire-select-2-example-proj

## Testing WIP

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jack Bayliss](https://github.com/jackbayliss)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
