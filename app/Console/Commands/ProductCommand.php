<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\ProductController;
use Illuminate\Console\Command;

class ProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Echo product test';

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
        ProductController::test();
    }
}
