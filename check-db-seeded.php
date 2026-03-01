<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
try {
    echo \Illuminate\Support\Facades\Schema::hasTable('global_settings') ? 'seeded' : 'empty';
} catch (\Exception $e) {
    echo 'empty';
}
