#ShiftpiCountryFlags
Provides access to various country flags

## Installation
```sh
TBD
```

## Configuration
Copy "vendor/shiftpi/shiftpi-country-flags/data/shiftpicountryflags.global.php.dist" to
"config/autoload/shiftpicountryflags.global.php".

Edit the configuration file:
```php
return array(
    'countryflags' => array(
        'mapper' => 'ShiftpiCountryFlags\Mapper\Filename',          // country code -> file path mapper
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
```php
//...
$this->countryFlagUrl('BR', 64);
//...
```
Where the size is optional again.

## License
Licensed under the MIT license. See license file.
The flag icons are from http://www.gosquared.com/ (licensed under the MIT license, too).