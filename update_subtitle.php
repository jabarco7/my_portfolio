<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$kernel->bootstrap();

// Update the hero_social_subtitle setting
use App\Models\Setting;

Setting::where('key', 'hero_social_subtitle')->update(['value' => 'Let\'s connect and build amazing projects together']);

echo "Social subtitle updated successfully!";
