<?php

namespace App\Console\Commands;

use App\Jobs\StoreCoingeckoDataJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchCoingeckoDataCommand extends Command
{
    protected $signature = 'coingecko:fetch-data';
    protected $description = 'Fetches data from Coingecko API and stores it in the database';

    public function handle()
    {
        $response = Http::get('https://api.coingecko.com/api/v3/coins/list?include_platform=true');
        $data = $response->json();

        $this->info('Fetching data from Coingecko API...');

        $chunks = array_chunk($data, 1000); // Split data into smaller chunks for batch processing

        foreach ($chunks as $chunk) {
            dispatch(new StoreCoingeckoDataJob($chunk));
        }

        $this->info('Data fetch job dispatched for processing!');
    }
}
