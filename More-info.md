If you have specific files sitting outside the `views/` folder (for example, a dedicated script like `login.php`, `dashboard.php`,
or some backend processing files in the root folder), you can handle them easily by changing the path inside your `case` statement.

Instead of being forced to use `$viewDir`, you can point directly to `__DIR__` (the root directory) for those specific files.

### Example: Handling files outside the `views` folder

```php
<?php
// Get the requested path
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove the subfolder name (/php-routing) from the path dynamically
$scriptName = dirname($_SERVER['SCRIPT_NAME']);
if ($scriptName !== '/' && $scriptName !== '\\') {
    $request = str_replace($scriptName, '', $request);
}

// Clean up trailing/leading slashes
$request = trim($request, '/');

$viewDir = __DIR__ . '/views/';

switch ($request) {
    case '':
    case 'home':
        require $viewDir . 'home.php';
        break;
        
    case 'contact':
        require $viewDir . 'contact.php';
        break;
        
    // Example: A page sitting directly in the root folder (outside /views)
    case 'login':
        require __DIR__ . '/login.php';
        break;

    // Example: A sub-folder file outside views
    case 'admin/dashboard':
        require __DIR__ . '/admin/dashboard.php';
        break;
        
    default:
        http_response_code(404);
        require $viewDir . '404.php';
        break;
}

```

### Why this works:

* **`$viewDir`** points to your templates folder (`__DIR__ . '/views/'`).
* **`__DIR__`** points directly to your project's root folder.

By using `__DIR__ . '/filename.php'`, your router can grab and execute any PHP file anywhere on your server while still keeping your nice clean URL (`[website.com/login](https://website.com/login)` instead of `[website.com/login.php](https://website.com/login.php)`)!
