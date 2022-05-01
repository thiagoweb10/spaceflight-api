<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\SwaggerAPIController;

class StockScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consumo:SwaggerAPIController';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Consome dados da tabela noticias da API Swagger';

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

        //Log::info("Cron is working fine!");
    }
}
