<h1 align="center">Menvel-Setting</h1>

Menvel-Setting is a setting helper for Lumen and Laravel.

Getting Started
---

Installation :

```
$ composer require hsbmaulana/menvel-setting
```

How to use it :

- Publish files.

```
$ php artisan vendor:publish --provider="Menvel\Setting\SettingServiceProvider"
```

```
$ php artisan migrate
```

- Put `Menvel\Setting\SettingServiceProvider` to service provider configuration list.

Author
---

- Hasby Maulana ([@hsbmaulana](https://linkedin.com/in/hsbmaulana))
