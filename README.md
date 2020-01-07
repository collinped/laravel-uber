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
UBER_ENV=local //optional - uses your current APP_ENV by default
UBER_ID=
UBER_SECRET=
```

Add your SFTP settings to the drivers array in config/filesystems.php

```php
'drivers' => [
    ...,

    'sftp' => [
        'driver' => sftp',
        'host' => 'sftp.uber.com',
        'username' => env('UBER_SFTP_USERNAME'),
        'password' => env('UBER_SFTP_PASSWORD'),
        'privateKey' => env('UBER_PRIVATE_KEY', '/path/to/privateKey'),
        'passphrase' => env('UBER_PRIVATE_KEY_PASSPHRASE'), //optional if set during RSA creation
        'port' => 2222,
        'root' => '',
        // 'timeout' => 30,
    ],
]
```

See Uber Settings for instructions on how to get these values.

### laravel-uber Roadmap

- [ ] SFTP Upload Users to Uber Business
- [ ] SFTP Upload Expense Codes to Uber Business
- [ ] Download transactional data from Uber Business

### Links
- SFTP Automation - https://developer.uber.com/docs/businesses/data-automation/introduction#introduction
- Transactional Data - https://developer.uber.com/docs/businesses/data-automation/data-download
