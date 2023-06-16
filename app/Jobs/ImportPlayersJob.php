<?php

namespace App\Jobs;

use App\Services\AppConfigServices;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImportPlayersJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected string $environment;
    protected string $location;
    protected string $url;
    protected string $brand;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $location, string $url, string $brand)
    {
        //
        $this->location = $location;
        $this->url = $url;
        $this->brand = $brand;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $storageFile = explode("\n", Storage::disk('import')->get($this->location));

        $env = env("APP_ENV");
        $stoppedAt = 0;

        try {
            $salesforceApiSettings = AppConfigServices::getSettings("old_salesforce_api");
            $client = new Client([
                'base_uri' => $salesforceApiSettings['OLD_SALESFORCE_API_' . $env]

            ]);
            foreach ($storageFile as $playerId) {
                if (is_numeric($playerId)) {
                    $stoppedAt = $playerId;
                    $client->get(
                        $this->url . $playerId . "?token=" . $salesforceApiSettings['OLD_SALESFORCE_TOKEN_' . $env],
                        ['verify' => false]
                    );
                }
            }
            Log::stack(['slack','gelf'])->info("Import for " . $this->brand . " Ended", [
                "date" => Carbon::now(),
                "Total Players" => sizeof($storageFile)
            ]);
        } catch (\Exception $exception) {
            Log::stack(['slack' , 'gelf'])->error("Import for " . $this->brand . " Have errors", [
               "error_file" => __FILE__,
               "error_line" => $exception->getLine(),
               "error_message" => $exception->getMessage(),
               "error_stoppedAt" => $stoppedAt,
            ]);
        }
    }
}
