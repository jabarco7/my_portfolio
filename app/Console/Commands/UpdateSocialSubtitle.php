<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Setting;

class UpdateSocialSubtitle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-social-subtitle {text}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the hero social subtitle text';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $text = $this->argument('text');

        // Update or create the setting
        Setting::updateOrCreate(
            ['key' => 'hero_social_subtitle'],
            ['value' => $text]
        );

        $this->info("Social subtitle updated to: {$text}");

        return Command::SUCCESS;
    }
}
