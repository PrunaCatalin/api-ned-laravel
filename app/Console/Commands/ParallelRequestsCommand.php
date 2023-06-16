<?php

namespace App\Console\Commands;

use App\Services\Google\GoogleAnalyticsGA4Service;
use App\Services\Google\GoogleAnalyticsService;
use App\Services\Google\GoogleVersion;
use DOMDocument;
use DOMXPath;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise;
use Illuminate\Console\Command;
use Illuminate\Console\OutputStyle;

class ParallelRequestsCommand extends Command
{
    protected $signature = 'parallel:requests {--website=} {--views=}';
    protected $description = 'Perform parallel requests using GuzzleClient';

    /**
     * @throws GuzzleException
     */
    public function handle()
    {
        $slug = $this->option('website');
        $views = $this->option('views');
        $this->info('Keep in mind views will be views = views * nr_keywords find in page');
        $url = "https://" . $slug;
        $code = "G-HMWQN5C82N";
        $version = (str_contains($code, "G-")) ? GoogleVersion::VERSION_V2 : GoogleVersion::VERSION_V1;
        $lang = "ro";
        $metaData = $this->getMetaDataUrl($url);
        $googleService = new GoogleAnalyticsService();
        $service = new GoogleAnalyticsGA4Service();
        $requests = [];
        $agent = "";
        for ($i = 0; $i < $views; $i++) {
            foreach ($metaData['keywords'] as $keyword) {
                $payload = $service
                    ->setUa($code)
                    ->setUrl($url)
                    ->setUrlPage($url)
                    ->setTitlePage($metaData['title'])
                    ->setLanguage($lang)
                    ->setCountry($lang)
                    ->setKeyword($keyword)
                    ->setAgent($service->randomWebAgent())
                    ->setEvent();
                $requests[$keyword] = [
                    'payload' => $payload->buildPayload() ,
                    "params" => [
                        'agent' => $service->getAgent(),
                        'keyword' => $keyword,
                        'event' => $service->getEvent()
                    ]
                ];
            }

        // Create a new GuzzleClient instance


            $promises = [];
            $output = new OutputStyle($this->input, $this->output);


            foreach ($requests as $key => $request) {
                $client = new Client(
                    [
                        'headers' => [
                            'User-Agent' => $request['params']['agent']
                        ]
                    ]
                );
                $promises[$key] = $client->get($request['payload']);
                $output->writeln('<info>KeyWord: </info><comment>'.$key.'</comment> |<info>Event : </info><comment>'.$request['payload'].'</comment>');
            }
        }
    }

    /**
     * @throws GuzzleException
     */
    private function getMetaDataUrl($url): array
    {
        $metaData = ["title" => "", "keywords" => []];
        $client = new Client();
        $response = $client->get($url);
        $body = (string) $response->getBody();
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($body);
        $metaData['title'] = $dom->getElementsByTagName('title')[0]->nodeValue;
        $xpath = new DOMXPath($dom);
        $keywords = $xpath->query('//meta[@name="keywords"]/@content');

        if ($keywords->length > 0) {
            $metaData['keywords'] =  explode(",", $keywords->item(0)->nodeValue);
        }
        return $metaData;
    }
}
