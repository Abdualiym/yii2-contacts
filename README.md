# yii2-contacts extension

The extension allows build multi language slider.

## Installation

- Install with composer:

```bash
composer require abdualiym/yii2-contacts
```

- **After composer install** run console command for create tables:

```bash
php yii migrate/up --migrationPath=@vendor/abdualiym/yii2-contacts/migrations
```

- add to common config file:
```php
'components' => [
    'contact' => [
        'class' => 'abdualiym\contacts\ContactModule',
        'developmentEmail' => 'yourDev@email.com',
    ],
],
```