#ShiftpiCountryFlags
Provides access to various country flags

## Installation
### Using Composer
Require `shiftpi/country-flags` in your `composer.json`. Then update your dependencies.
You can now enable the module in the `config/application.config.php` file:
```php
// ...
'modules' => array(
    // ...
    'ShiftpiCountryFlags',
    // ...
),
// ...
```
If you are using Windows, make sure `php_fileinfo.dll` is loaded.

## Configuration
Copy `vendor/shiftpi/shiftpi-country-flags/config/shiftpicountryflags.global.php.dist` to
`config/autoload/shiftpicountryflags.global.php`.

Edit the configuration file:
```php
return array(
    'countryflags' => array(
        'mapper' => 'ShiftpiCountryFlags\Mapper\Filename',      // country code -> file path mapper
        'datapath' => '/alternative/data/path',                 // new since 0.1.1; optional
    ),
);
```

## Usage
### Route
By default the module provides a route to access the flags:
```
/countryflags/<countrycode>[/<size>]
```
Where countrycode is the ISO 3166 ALPHA-2 code (see https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2#Officially_assigned_code_elements).
Size defines the width and height of the flag in px. Possible values are 16, 24, 32, 48, 64. Default is 16.

### View Helper
```html
<img src="<?php echo $this->countryFlagUrl('SC', 64) ?>" alt="Seychelles" width="64" />
```
Where the second parameter (size) is optional (default 16).

## License
Licensed under the MIT license. See license file.
The flag icons are from http://www.gosquared.com/ (licensed under the MIT license, too).