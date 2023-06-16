<?php

namespace App\Services\Google\Interfaces;

interface IGoogleAnalyticsService
{
    public function generateRandomString(): string;
    public function generateRandomProxy(): string;
    public function randomWebAgent(): string;
    public function buildPayload(): string;
    public function getKeywords(): array;
    public function setKeywords(array $keywords): self;
    public function getAgents(): array;
    public function setAgents(array $agents): self;
    public function getLanguage(): string;
    public function setLanguage(string $language): self;
    public function getCountry($country);
    public function setCountry(string $country): self;
    public function getUa(): string;
    public function setUa(string $ua): self;
    public function getCid(): string;
    public function getUrl(): string;
    public function setUrl(string $url): self;
    public function getUrlPage(): string;
    public function setUrlPage(string $urlPage): self;
    public function getTitlePage(): string;
    public function setTitlePage(string $titlePage): self;
    public function getKeyword(): string;
    public function setKeyword(string $keyword): self;
    public function getPayload(): string;
    public function setPayload(string $payload): self;
    public function getAgent(): string;
    public function setAgent(string $agent): self;
    public function getVersion(): string;
    public function setVersion(string $version): self;
    public function isScroll(): bool;
    public function setScroll(bool $scroll): self;

    public function setStart(int $nr): self;
    public function getStart(): int;
}
