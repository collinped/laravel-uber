![Laravel Uber](cover.png?raw=true "Laravel Uber")

laravel-uber
===============
UNDER CONSTRUCTION - Laravel Uber API Integration

## Installation

Begin by installing this package through Composer. Run this command from the Terminal:

```bash
composer require collinped/laravel-uber
```
If you're using Laravel 5.5+, this is all there is to do.

Should you still be on older versions of Laravel, the final steps for you are to add the service provider of the package and alias the package. To do this open your `config/app.php` file.

### Integration for older versions of Laravel (5.5 -)

To wire this up in your Laravel project, you need to add the service provider.
Open `app.php`, and add a new item to the providers array.

```php
'Collinped\Uber\UberServiceProvider',
```

###Configuring the package

You can publish the config file with:

```php
php artisan vendor:publish --provider="Collinped\Uber\UberServiceProvider" --tag="config"
```

This is the contents of the file that will be published at config/uber.php

Insert the following values into your .env

```php
UBER_ENV=dev
UBER_ID=
UBER_SECRET=
```

See Uber Settings for instructions on how to get these values.
