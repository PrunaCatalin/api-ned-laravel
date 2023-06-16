<?php

namespace App\Providers;

use App\Services\AppConfigServices;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('app_config')) {
            $mailSettings = AppConfigServices::getSettings('mail_smtp');
            if ($mailSettings) {
                $config = array(
                    'transport' => 'smtp',
                    'host' => $mailSettings['MAIL_HOST'],
                    'port' => $mailSettings['MAIL_PORT'],
                    'encryption' => $mailSettings['MAIL_ENCRYPTION'],
                    'username' => $mailSettings['MAIL_USERNAME'],
                    'password' => $mailSettings['MAIL_PASSWORD'],
                    'timeout' => $mailSettings['MAIL_TIMEOUT'],
//                'local_domain' => $mailSettings['MAIL_LOCAL_DOMAIN'],
                );
                Log::channel('slack')->info("Import for Started", [
                    "date" => Carbon::now(),
                    "config_mail" => $config
                ]);
                //Config::set('mail.mailers.smtp', $config);
            }
        }
    }
}
