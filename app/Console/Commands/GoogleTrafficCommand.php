<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Admin\Entities\GoogleGeoId;

class GoogleTrafficCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'google:start';

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
        $this->insertGeoId();
    }
    private function insertGeoId(): void
    {
        $filePath = storage_path('app/resource/google/geo_targets.csv');
        if (($handle = fopen($filePath, 'r')) !== false) {
            fgetcsv($handle);
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $googleGeoID = new GoogleGeoID();
                $googleGeoID->criteria_id = $data[0];
                $googleGeoID->name = $data[1];
                $googleGeoID->canonical_name = $data[2];
                $googleGeoID->parent_id = is_numeric($data[3]) ?? 0;
                $googleGeoID->country_code = $data[4];
                $googleGeoID->target_type = $data[5];
                $googleGeoID->status = $data[6];
                $googleGeoID->save();
            }
            fclose($handle);
        }
    }
}
