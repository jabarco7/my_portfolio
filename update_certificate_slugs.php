
<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Certificate;

echo "=== Updating Certificate Slugs ===\n";

$certificates = Certificate::whereNull('slug')->get();

foreach($certificates as $cert) {
    $baseSlug = \Illuminate\Support\Str::slug($cert->title);
    $slug = $baseSlug;
    $counter = 1;
    
    // Ensure unique slug
    while (Certificate::where('slug', $slug)->where('id', '!=', $cert->id)->exists()) {
        $slug = $baseSlug . '-' . $counter;
        $counter++;
    }
    
    $cert->slug = $slug;
    $cert->save();
    
    echo "Updated: ID " . $cert->id . " -> Title: " . $cert->title . " -> Slug: " . $slug . "\n";
}

echo "=== Update Complete ===\n";

// Show final results
echo "\n=== Final Certificate Data ===\n";
$allCertificates = Certificate::all();
foreach($allCertificates as $cert) {
    echo "ID: " . $cert->id . ", Title: " . $cert->title . ", Slug: " . $cert->slug . "\n";
}
