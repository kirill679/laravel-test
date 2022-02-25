<?php

namespace App\Console\Commands;

use App\Models\MenuItem;
use Illuminate\Console\Command;

class CountMenuItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'menu:count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display the number of menu items in the database';

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
    public function handle(): int
    {
        $this->info(MenuItem::count());

        return 0;
    }
}
