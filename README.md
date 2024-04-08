# Simple to use Livewire component for Select2

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jackbayliss/livewire-select2.svg?style=flat-square)](https://packagist.org/packages/jackbayliss/livewire-select2)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/jackbayliss/livewire-select2/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/jackbayliss/livewire-select2/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jackbayliss/livewire-select2/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/jackbayliss/livewire-select2/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jackbayliss/livewire-select2.svg?style=flat-square)](https://packagist.org/packages/jackbayliss/livewire-select2)

Easy to use Livewire component specifically for select2. 

## Installation

You can install the package via composer:

```bash
composer require jackbayliss/livewire-select2
```
## Initial Setup
First
```php
$livewireSelect2 = new JackBayliss\LivewireSelect2();
echo $livewireSelect2->echoPhrase('Hello, JackBayliss!');
```
## Usage

```php
$livewireSelect2 = new JackBayliss\LivewireSelect2();
echo $livewireSelect2->echoPhrase('Hello, JackBayliss!');
```

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
