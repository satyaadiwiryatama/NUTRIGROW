<?php

// Prepare writable directories in /tmp for Vercel serverless environment
$dirs = [
    '/tmp/views',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
];

foreach ($dirs as $dir) {
    if (! is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Forward to Laravel's public/index.php
require __DIR__.'/../public/index.php';
