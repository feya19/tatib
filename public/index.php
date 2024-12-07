<?php

require_once __DIR__ . '/../core/Env.php';
require_once __DIR__ . '/../helpers/humanDate.php';

Core\Env::load();

// Set global exception handler
set_exception_handler(function ($exception) {
    http_response_code(500);

    // Log the exception
    error_log($exception);

    if (Core\Env::get('APP_DEBUG') === 'true') {
        // Display detailed error in debug mode
        echo "<h1>Exception Caught</h1>";
        echo "<p><strong>Message:</strong> " . $exception->getMessage() . "</p>";
        echo "<p><strong>File:</strong> " . $exception->getFile() . "</p>";
        echo "<p><strong>Line:</strong> " . $exception->getLine() . "</p>";
        echo "<pre>" . $exception->getTraceAsString() . "</pre>";
    } else {
        // Friendly error page in production
        echo "<h1>An error occurred</h1>";
        echo "<p>We're sorry, but something went wrong. Please try again later.</p>";
    }
});

// Set error handler to convert errors to exceptions
set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, 0, $severity, $file, $line);
});

require_once __DIR__ . '/../core/Route.php';
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Database.php';

// Autoload Controllers (optional)
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Include routes
require_once __DIR__ . '/../app/routes.php';