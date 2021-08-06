<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Promotion_Product;

class Promotion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promotion:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Promotion_Product::whereRaw('finish <= now()')
        ->update(['status' => 1]);
    }
}
