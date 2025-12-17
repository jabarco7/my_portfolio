<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ShowCertificateCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:show-certificate-categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display all certificate categories';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $categories = \App\Models\CertificateCategory::all();

        $this->info('Certificate Categories:');
        $this->info('-------------------');

        foreach ($categories as $category) {
            $status = $category->is_active ? 'Active' : 'Inactive';
            $this->line("ID: {$category->id} | Name: {$category->name} | Color: {$category->color} | Status: {$status}");
        }

        $this->info('-------------------');
        $this->info("Total: {$categories->count()} categories");

        return 0;
    }
}
