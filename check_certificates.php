
<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Certificate;

echo "=== Certificate Data ===\n";

$certificates = Certificate::all();

foreach($certificates as $cert) {
    echo "ID: " . $cert->id . "\n";
    echo "Title: " . $cert->title . "\n";
    echo "Slug: " . ($cert->slug ?? 'NULL') . "\n";
    echo "Active: " . ($cert->is_active ? 'Yes' : 'No') . "\n";
    echo "---\n";
}
