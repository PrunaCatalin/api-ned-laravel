<?php

namespace App\Console\Commands;

use App\Models\App\AppConfig;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redis;

class AppConfigCommand extends Command
{

    protected $signature = 'app:create-config {--slug=} {--settings=}';

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
        $slug = $this->option('slug');
        $settings = $this->option('settings');
        if (!$slug  && !$settings) {
            $this->output->write('Slug and Settings are mandatory', true);
        } else {
            $cryptSettings = Crypt::encrypt($settings);
            Redis::set($slug, $cryptSettings);
            if (AppConfig::create([ 'slug' => $slug, 'settings' => $cryptSettings])) {
                Redis::set($slug , $cryptSettings);
                $this->output->write('Settings are saved', true);
            }
        }
        return 0;
    }
}
