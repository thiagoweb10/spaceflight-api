<?php

namespace Database\Seeders;

use App\Models\JobSwagger;
use Illuminate\Database\Seeder;

class JobSwaggerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobSwagger::create([
            'description' => 'Consumo da API Swagger notícias espaciais',
            'next_id' => 1,
            'active' => 1
        ]);
    }
}
