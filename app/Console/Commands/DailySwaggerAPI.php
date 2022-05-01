<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SwaggerAPIController;

class DailySwaggerAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consume:swagger';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to consume in Swagger API.';

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
        $oSwaggerAPI = new SwaggerAPIController();
        $oSwaggerAPI->getConsumeAPI();
        
        echo 'primeiro teste do agendador basico. ';
    }
}
