<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class SyncCategoriesTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:categories-table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will populate the categories table with all available categories.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Category::create(['name' => 'artisans']);
        Category::create(['name' => 'keyboards']);
        Category::create(['name' => 'keycaps']);
        Category::create(['name' => 'pcbs']);
        Category::create(['name' => 'switches']);
        Category::create(['name' => 'other']);
    }
}
