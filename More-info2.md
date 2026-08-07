If you can successfully visit `[https://php-routing.free.nf/views/contact.php](https://php-routing.free.nf/views/contact.php)`, it means two things:

1. **The file physically exists:** Your server sees the actual `contact.php` file inside the `views/` folder and serves it directly, bypassing your `index.php` router entirely.
2. **Your `.htaccess` rule is allowing it:** Remember this line from your `.htaccess` file?
```apache
RewriteCond %{REQUEST_FILENAME} !-f

```


Because `views/contact.php` is an actual physical file (`!-f` is true), Apache follows its safety rule: *"Oh, that's a real file, so I won't redirect it to `index.php`; I'll just open it directly."*

### Why this is normal (and okay for now):

In a simple project structure like this, your view files are directly accessible if someone guesses the URL path.

### How to block users from opening files inside `/views/` directly:

If you want to make your app more secure so users *must* go through your router (`/contact`) and can never access files inside `views/` directly, you can place a secondary `.htaccess` file *inside* your `views/` folder.

Create a new file named `.htaccess` inside the `views/` folder and add this single line:

```apache
Deny from all

```

*(Or if your live hosting server uses Apache 2.4+, use `Require all denied`)*

**What this does:**
It locks down the `views` folder entirely. Users can no longer visit `[https://php-routing.free.nf/views/contact.php](https://php-routing.free.nf/views/contact.php)` (it will give them a 403 Forbidden error). However, **your `index.php` router can still load them** using `require` because PHP runs on the server side and ignores Apache access rules for internal file inclusion!
