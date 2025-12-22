<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Project;

$projects = Project::all();

foreach ($projects as $project) {
    echo "Project ID: " . $project->id . "\n";
    echo "Title: " . $project->title . "\n";
    // Access raw attributes to see what's actually in the DB
    $attributes = $project->getAttributes();
    echo "Challenges (Raw): " . ($attributes['challenges'] ?? 'NULL') . "\n";
    echo "Solutions (Raw): " . ($attributes['solutions'] ?? 'NULL') . "\n";
    echo "Results (Raw): " . ($attributes['results'] ?? 'NULL') . "\n";
    
    // Access cast attributes
    echo "Challenges (Cast): " . json_encode($project->challenges) . "\n";
    echo "--------------------------------------------------\n";
}
