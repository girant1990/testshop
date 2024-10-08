<?php

namespace App\Jobs;

use App\Events\ExportFinished;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;

class ExportToCsv implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected $items, protected $secretKey, protected string $filename = 'items_csv.csv')
    {
        $this->filename .= $this->secretKey . Carbon::now()->timestamp;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $csv = Writer::createFromString('');
        $csv->setDelimiter(',');
        $csv->insertOne(['id', 'name', 'price', 'count']);

        foreach ($this->items as $item) {
            $csv->insertOne(
                [
                    $item['id'],
                    $item['name'],
                    $item['price'],
                    $item['count']
                ]
            );
        }

        Storage::put("public/exports/{$this->filename}.csv", $csv->toString());
        ExportFinished::dispatch($this->filename, $this->secretKey);
    }
}
