<?php

namespace App\Jobs;

use App\Models\Coin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreCoingeckoDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 30;
    
    public $timeout = 600;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        foreach ($this->data as $record) {
            Coin::updateOrCreate(
                ['id' => $record['id']],
                [
                    'symbol' => $record['symbol'],
                    'name' => $record['name'],
                    'platforms' => json_encode($record['platforms']),
                ]
            );
        }
    }
}
