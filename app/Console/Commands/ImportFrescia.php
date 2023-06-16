<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Google_Client;
use Google_Service_Drive;
use Modules\FresciaStore\Services\SupplierProductService;

class ImportFrescia extends Command
{
    private $link = "https://bi.1bs.ro/45406123/http.php";
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:frescia';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::stack(['slack'])->info("Import for products started", [ "file" => __FILE__  ]);
        try {
            (new SupplierProductService('FresciaStore'))->callService();
        } catch (\Exception $ex) {
            Log::stack(['slack'])->error("File for import is empty", [
                "file" => __FILE__  ,
                "line" => __LINE__,
                "error_return" => $ex
            ]);
        }
    }
}
