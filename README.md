# SessionProvider

This repository contains different Session implementation for KodiApp.

## Installation

```bash
$ composer require kodi-app/kodi-session
```
## Configure SessionHook

### PandabaseSessionHook

PandabaseSessionHook implementation is based on Symfony's PdoSessionHandler. 

```php
$application->run([
    // ...
    KodiConf::HOOKS => [
        // ...
        [
            "class_name" => PandabaseSessionHook::class,
            "parameters" => [
                // Optional, you have to set it when you have more Connection instance in ConnectionManager
                "connection_name"  => "default",
                
                // Optional, 'options' parameter is same as PdoSessionHandler's 'options' parameter
                "options" => [
                    // ...
                ]
            ]
        ],
        // ...
    ],
    // ...
]);
```

You find details about PdoSessionHandler [here](https://symfony.com/doc/current/doctrine/pdo_session_storage.html).

You find details about Pandabase [here](https://github.com/nagyatka/pandabase).

## Configure SessionProvider
```php
$application->run([
    KodiConf::SERVICES => [
        SessionProvider::class
    ]
]);
```
## How to use SessionProvider
```php
/** @var Session $session */
$session = Application::get("session")

// Get username value from session (same as $_SESSION["username"]). If it doesnt exist returns with "anon".
$username = $session->get("username","anon")

// Set a new username
$new_username = "john_doe";
$session->set("username",$new_username);
```





