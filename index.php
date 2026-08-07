
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
        
    default:
        http_response_code(404);
        require $viewDir . '404.php';
        break;
}
?>
