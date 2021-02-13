<?php

namespace App\Console\Commands;

use App\Models\Condition;
use Illuminate\Console\Command;

class SyncConditionsTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:conditions-table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will populate the conditions table with all available conditions.';

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
        Condition::create(['name' => 'Brand New']);
        Condition::create(['name' => 'Mint']);
        Condition::create(['name' => 'Excellent']);
        Condition::create(['name' => 'Very Good']);
        Condition::create(['name' => 'Good']);
        Condition::create(['name' => 'Fair']);
        Condition::create(['name' => 'Poor']);
        Condition::create(['name' => 'For Parts/Repair Only']);
    }
}
