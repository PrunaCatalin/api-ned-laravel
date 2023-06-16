<?php

namespace App\Services\Google;

use App\Services\Google\Interfaces\IGoogleAnalyticsService;
use App\Services\Google\Tools\GoogleAnalyticsTools;

/**
 *
 */
class GoogleAnalyticsGA4Service implements IGoogleAnalyticsService
{
    use GoogleAnalyticsTools;

    public string $googleLink = "https://www.google-analytics.com/collect?";
    /**
     * @var array
     */
    public array $keywords = [];
    /**
     * @var array
     */
    public array $agents = ['Google Chrome', 'Firefox', 'Safari', 'Microsoft Edge'];
    /**
     * @var string
     */
    public string $language = "";
    /**
     * @var string
     */
    public string $country = "";
    /**
     * @var string
     */
    public string $ua = "";
    /**
     * @var string
     */
    public string $cid = "";
    /**
     * @var string
     */
    public string $url = "";
    /**
     * @var string
     */
    public string $urlPage = "";
    /**
     * @var string
     */
    public string $titlePage = "";
    /**
     * @var string
     */
    public string $keyword = "";

    /**
     * @var string
     */
    public string $payload = "";
    /**
     * @var string
     */
    public string $agent = "";
    /**
     * @var string
     */
    private string $version = "v=2";

    /**
     * @var bool
     */
    public bool $scroll = false;

    public string $userAgentMobile = "";

    public int $start = 0;
    /**
     * @var string
     */
    public string $event;

    /**
     * @return string
     */
    public function getUserAgentMobile(): string
    {
        return $this->userAgentMobile;
    }

    /**
     * @param string $userAgentMobile
     */
    public function setUserAgentMobile(string $userAgentMobile): IGoogleAnalyticsService
    {
        $this->userAgentMobile = $userAgentMobile;
        return $this;
    }

    public function buildPayload(): string
    {
        $payload = [
            $this->version,
            "tid=" . $this->ua,
            "gtm=" . rand(10000000, 99999999),
            "_p=" .  mt_rand(0, 947483647),
            "cid=" . $this->getCid(),
            "dh=" . $this->urlPage ,
            "ul=" . $this->language,
            "_uc=" . strtoupper($this->country),
            "sr=" . $this->getRandomScreenResolution() ,
            "_s=1",
            "sid=" . rand(10000000, 99999999),
            "sct=" . rand(1, 24),
            "seg=1",
            "dl=" . $this->urlPage,
            "dr=https%3A%2F%2Fwww.google.com%2Fsearch%3Fq%3D" . $this->keyword,
            "dt=" . $this->titlePage,
            "ck=" . urlencode($this->keyword),
            "en=" . $this->getEvent(),
            "_et=" . time(),
            "_fv=" . rand(1, 2),
            "_ee=" . rand(1, 2) ,
            "_ss=".rand(1,2) ,//. $this->getStart() ,
            'uaa=' . $this->generateArhitecture()
        ];
        return  $this->googleLink . implode("&", $payload);
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    public function setEvent(): IGoogleAnalyticsService
    {
        $event = [
            'page_view' , 'scroll&percent_scrolled=' . $this->getRandomPercentage(),
        ];
        $indexRandom = rand(0, count($event) - 1);
        $this->event =  $event[$indexRandom];
        return $this;
    }
    /**
     * @return array
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /**
     * @param array $keywords
     */
    public function setKeywords(array $keywords): IGoogleAnalyticsService
    {
        $this->keywords = $keywords;
        return $this;
    }

    /**
     * @return array
     */
    public function getAgents(): array
    {
        return $this->agents;
    }

    /**
     * @param array $agents
     */
    public function setAgents(array $agents): IGoogleAnalyticsService
    {
        $this->agents = $agents;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language): IGoogleAnalyticsService
    {
        $this->language = $language;
        return $this;
    }

    public function setCountry(string $country): IGoogleAnalyticsService
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getUa(): string
    {
        return $this->ua;
    }

    /**
     * @param string $ua
     */
    public function setUa(string $ua): IGoogleAnalyticsService
    {
        $this->ua = $ua;
        return $this;
    }

    public function getCid(): string
    {
        return $this->generatetCid(GoogleVersion::VERSION_V2);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): IGoogleAnalyticsService
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrlPage(): string
    {
        return $this->urlPage;
    }

    /**
     * @param string $urlPage
     */
    public function setUrlPage(string $urlPage): IGoogleAnalyticsService
    {
        $this->urlPage = $urlPage;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitlePage(): string
    {
        return $this->titlePage;
    }

    /**
     * @param string $titlePage
     */
    public function setTitlePage(string $titlePage): IGoogleAnalyticsService
    {
        $this->titlePage = $titlePage;
        return $this;
    }

    /**
     * @return string
     */
    public function getKeyword(): string
    {
        return $this->keyword;
    }

    /**
     * @param string $keyword
     */
    public function setKeyword(string $keyword): IGoogleAnalyticsService
    {
        $this->keyword =  $keyword;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayload(): string
    {
        return $this->payload;
    }

    /**
     * @param string $payload
     */
    public function setPayload(string $payload): IGoogleAnalyticsService
    {
        $this->payload = $payload;
        return $this;
    }

    /**
     * @return string
     */
    public function getAgent(): string
    {
        return $this->agent;
    }

    /**
     * @param string $agent
     */
    public function setAgent(string $agent): IGoogleAnalyticsService
    {
        $this->agent = $agent;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion(string $version): IGoogleAnalyticsService
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return bool
     */
    public function isScroll(): bool
    {
        return $this->scroll;
    }

    /**
     * @param bool $scroll
     */
    public function setScroll(bool $scroll): IGoogleAnalyticsService
    {
        $this->scroll = $scroll;
        return $this;
    }

    public function setStart(int $nr): IGoogleAnalyticsService
    {
        $this->start = $nr;
        return $this;
    }

    public function getStart(): int
    {
        return $this->start;
    }
}
