<?php

namespace App\Services\Google;

use App\Services\Google\Interfaces\IGoogleAnalyticsService;
use App\Services\Google\Tools\GoogleAnalyticsTools;

class GoogleAnalyticsUAService implements IGoogleAnalyticsService
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
    private string $version = "v=1";

    /**
     * @var bool
     */
    public bool $scroll = false;

    public function buildPayload(): string
    {
        $this->setAgent($this->randomWebAgent());
        $payload = [
            $this->version, "t=pageview", "tid=" . $this->ua, "cid=" . $this->cid,  "dh=" . $this->url,
            "dp=%2F" .  $this->urlPage, "dt=" .  $this->titlePage,
            "ul=" .  $this->language, "geoid=" .  $this->getCountry($this->country)->criteria_id,
            "cm=organic", "dr=https%3A%2F%2Fwww.google.com%2Fsearch%3Fq%3D" . $this->keyword,
            "ua=" . $this->getAgent(), "de=UTF-8",
            "uip=" . $this->generateRandomProxy(),  "cs=%28direct%29", "ck=" . $this->keyword, "sc=start"
        ];
        return $this->googleLink . implode("&", $payload);
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
        return $this->generatetCid(GoogleVersion::VERSION_V1);
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
        // TODO: Implement setStart() method.
    }

    public function getStart(): int
    {
        // TODO: Implement getStart() method.
    }
}
