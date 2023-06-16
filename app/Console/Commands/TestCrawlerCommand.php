<?php

namespace App\Console\Commands;

use GuzzleHttp\Promise\Utils;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\DomCrawler\Crawler;

class TestCrawlerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:start';

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
        $client = new Client(
            [
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36 Edg/91.0.864.37'
                ]
            ]
        );
        $response = $client->request('GET','https://emag.ro');
        $crawler = new Crawler((string) $response->getBody());
        $scriptNodes = $crawler->filterXPath('//script');

        $googleAnalyticsCode = null;
        $googleTagManagerCode = null;

        foreach ($scriptNodes as $scriptNode) {
            $textContent = $scriptNode->textContent;

            if (!$googleAnalyticsCode && strpos($textContent, 'UA-') !== false) {
                preg_match('/UA-\d{4,10}-\d{1,4}/i', $textContent, $matches);
                $googleAnalyticsCode = $matches[0] ?? null;
            }

            if (!$googleTagManagerCode && strpos($textContent, 'GTM-') !== false) {
                preg_match('/GTM-\w{4,10}/i', $textContent, $matches);
                $googleTagManagerCode = $matches[0] ?? null;

                if ($googleTagManagerCode) {
                    $response = $client->request('GET', 'https://www.googletagmanager.com/gtm.js?id=' . $googleTagManagerCode);
                    $body = (string) $response->getBody();
                    preg_match('/vtp_measurementId":"(.*?)"/', $body, $matches);
                    $googleAnalyticsCode = $matches[1] ?? null;
                }
            }

            if (!$googleAnalyticsCode && strpos($textContent, 'G-') !== false) {
                preg_match('/G-\w{4,10}/i', $textContent, $matches);
                $googleAnalyticsCode = $matches[0] ?? null;
            }

            // Break the loop if we have both codes
            if ($googleAnalyticsCode && $googleTagManagerCode) {
                break;
            }
        }
        $this->info($googleAnalyticsCode);
    }
}
