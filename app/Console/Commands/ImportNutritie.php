<?php

namespace App\Console\Commands;

use App\Models\WdProductStats;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class ImportNutritie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:nutritie';

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
        $this->callNutritie();
        $files = Storage::files('nutritie');
        foreach ($files as $file) {
            $items = json_decode(Storage::get($file))->data;
            foreach ($items as $item) {
                WdProductStats::firstOrCreate(
                    [ 'name' => $item->name  ],
                    [
                    'name' => $item->name,
                    'name_override' => $item->name_override,
                    'energy_kj' => $item->energy_kj,
                    'energy_kcal' => $item->energy_kcal,
                    'fats' => $item->fats,
                    'saturated_fatty_acids' => $item->saturated_fatty_acids,
                    'carbohydrates_available' => $item->carbohydrates_available,
                    'sugars' => $item->sugars,
                    'proteins' => $item->proteins,
                    'salt' => $item->salt,
                    'weight' => $item->weight,
                    'piece_weight' => $item->piece_weight,
                    'is_additive' => $item->is_additive,
                    'ingredients_label' => $item->ingredients_label,
                    'allergens_count' => $item->allergens_count,
                    'additives_count' => $item->additives_count,
                    ]
                );
            }
        }
        return Command::SUCCESS;
    }

    /**
     * @throws GuzzleException
     */
    public function callNutritie()
    {
        $jar = new CookieJar();
        $client = new Client(['cookies' => $jar]);

// Send a POST request to the login endpoint with the necessary credentials
        $request = $client->request('GET', "https://api.nutrimeniu.ro/auth/csrf-cookie",
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ]
            ]
    );
        $cookies = $request->getHeader('Set-Cookie');

        $token = "";
        $collectCookie = [];
        foreach ($cookies as $cookie) {
            // Parses the cookie string into an array of key-value pairs
            $cookieArray = explode(';', $cookie);
            foreach ($cookieArray as $cookiePair) {
                $parts = explode('=', $cookiePair, 2);

                if (count($parts) === 2) {
                    list($name, $value) = $parts;
                    $collectCookie[$name] = $value;
                    if ($name === 'XSRF-TOKEN') {
                        // Do something with the cookie value
                        $token = urldecode($value);
                    }
                }
            }
        }
//        dd($token);
        $response = $client->request('POST', 'https://api.nutrimeniu.ro/auth/login', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'X-CSRF-Token' => $token,
                'Cookie' => implode(";", $cookies)
            ],
            'json' => [
                'email' => 'prunacatalin.costin@gmail.com',
                'password' => 'password',
                'remember' => 'true',
            ]
        ]);
// Get the cookies from the response
        $content = $response->getBody()->getContents();
        dd($content);
    }
}
