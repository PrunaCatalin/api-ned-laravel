<?php

namespace Modules\FresciaStore\Contracts;

interface ProductImportInterface
{
    public function run();
    public function callApi(string $url, array $attributes = [], string $method = "GET");

    public function import(array $products);
}
