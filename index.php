<?php
// Get the requested URI and clean up leading/trailing slashes
$request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// If your project is in a subfolder (e.g., localhost/php-routing/), 
// you might need to adjust the path matching, but assuming root domain or virtual host:
$viewDir = __DIR__ . '/views/';

switch ($request) {
    case '':
    case 'home':
        require $viewDir . 'home.php';
        break;
        
    case 'contact':
        require $viewDir . 'contact.php';
        break;
        
    default:
        http_response_code(404);
        require $viewDir . '404.php';
        break;
}
