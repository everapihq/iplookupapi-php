<p align="center">
<img src="https://app.iplookupapi.com/img/logo/iplookupapi.png" width="300"/>
</p>

# iplookupapi-php - PHP IP data lookup

[![Latest Version on Packagist](https://img.shields.io/packagist/v/everapi/iplookupapi-php.svg?style=flat-square)](https://packagist.org/packages/everapi/iplookupapi-php)
[![Total Downloads](https://img.shields.io/packagist/dt/everapi/iplookupapi-php.svg?style=flat-square)](https://packagist.org/packages/everapi/iplookupapi-php)

This package is a PHP wrapper for [iplookupapi.com](https://iplookupapi.com) that aims to make the usage of the API as easy as possible in your project.

## Installation

You can install the package via composer:

```bash
composer require everapi/iplookupapi-php
```

## Usage

Initialize the API with your API Key (get one for free at [iplookupapi.com](https://app.iplookupapi.com/register)):

```php
$iplookupapi = new \iplookupapi\iplookupapi\iplookupapiClient('YOUR-API-KEY');
```

Afterwards you can use the endpoints of the API like this:

```php
echo $iplookupapi->status();
```


```php
echo $iplookupapi->info([
    'ip' => '1.1.1.1',
    'language' => 'de',
]);
```


Learn more about endpoints, parameters and response data structure in the [docs].

[docs]: https://iplookupapi.com/docs
[iplookupapi.com]: https://iplookupapi.com

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
