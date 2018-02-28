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

- add to backend config file:
```php
'controllerMap' => [
    'contacts' => [
        'class' => 'abdualiym\contacts\controllers\ContactMessagesController',
    ],
],
```

- add to common config file:
```php
'components' => [
    'contact' => [
        'class' => 'abdualiym\contacts\ContactModule',
        'development' => true,
        'developmentEmail' => true,
    ],
],
```

- add to frontend config file:
```php
'controllerMap' => [
    'contacts' => [
        'class' => 'abdualiym\contacts\controllers\ContactController',
    ],
],
```