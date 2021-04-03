# php-classes

A Collection of PHP classes

### Class list

- Router.php
  example:

```php
<?php
    require_once 'Router.php';

    $router = new Router($_SERVER);

    $router->addRoute('users', function () {
        require_once 'Users.php';
        // Do something
    });

    $router->run();

```

- Request.php
- Database.php
- Helpers.php
- SessionHelper.php
- FileUploader.php
