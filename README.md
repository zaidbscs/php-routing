```
# Simple PHP Routing System (No Frameworks)

A lightweight, clean-URL routing system built from scratch using pure PHP and Apache `.htaccess`. 

This project demonstrates how to transition from traditional file-based URLs (e.g., `website.com/contact.php`) to modern, SEO-friendly clean URLs (e.g., `website.com/contact`) without requiring a heavy framework like Laravel or Symfony.

---

## Features

* **Clean URLs:** Removes `.php` file extensions from the browser address bar.
* **Centralized Entry Point:** Uses `index.php` as a single router to intercept and manage all incoming requests.
* **Apache Rewrite Engine:** Utilizes `.htaccess` configuration to handle invisible URL redirection.
* **Modular Views:** Separates application layout/content into dedicated view files.
* **Built-in Error Handling:** Automatically returns a `404 Not Found` HTTP status code and custom view for invalid routes.

---

## Project Structure

```text
php-routing/
├── .htaccess         # Apache server rewrite rules
├── index.php         # Central PHP router and request dispatcher
├── README.md         # Project documentation
└── views/
    ├── home.php      # Home page view template
    ├── contact.php   # Contact page view template
    └── 404.php       # Custom 404 error view template

```

---

## How It Works

1. **Request Interception (`.htaccess`):**
When a user visits a clean URL like `/contact`, the Apache server checks if a physical file or directory matches the request. If it does not exist, the Apache `RewriteRule` silently forwards the request to `index.php`.
2. **Path Parsing (`index.php`):**
The entry file captures the requested URI using `$_SERVER['REQUEST_URI']`, cleans up leading or trailing slashes, and evaluates the route using a PHP `switch` statement.
3. **View Dispatching:**
Based on the matched route, the router securely loads the corresponding view file using `require` or returns a `404` status code for unknown paths.

---

## Getting Started / Local Installation

### Prerequisites

* A local PHP development environment (e.g., XAMPP, Laragon, or WAMP).
* An Apache web server with **mod_rewrite** enabled (enabled by default in most local setups).

### Setup Steps

1. Clone or download this repository into your local server root directory (such as `htdocs` in XAMPP).
2. Ensure the `.htaccess` file is placed directly in the root folder of the project alongside `index.php`.
3. Open your web browser and navigate to your local server URL:
* **Home Page:** `http://localhost/php-routing/home` (or root)
* **Contact Page:** `http://localhost/php-routing/contact`
* **404 Handling:** `http://localhost/php-routing/random-page`




