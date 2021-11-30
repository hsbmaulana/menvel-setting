<h1 align="center">Menvel-Setting</h1>

Menvel-Setting is a setting helper for Lumen and Laravel.

Getting Started
---

Installation :

```
$ composer require hsbmaulana/menvel-setting
```

How to use it :

- Put `Menvel\Setting\SettingServiceProvider` to service provider configuration list.

- Migrate.

```
$ php artisan migrate
```

- Sample usage.

```php
use Menvel\Setting\Contracts\Repository\ISettingRepository;

$repository = app(ISettingRepository::class);
// $repository->setUser(...); //
// $repository->getUser(); //

// $repository->setup('key', 'value'); //
// $repository->setdown('...'); //
// $repository->all(); //
```

Author
---

- Hasby Maulana ([@hsbmaulana](https://linkedin.com/in/hsbmaulana))
