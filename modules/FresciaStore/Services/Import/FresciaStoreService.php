<?php

namespace Modules\FresciaStore\Services\Import;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\FresciaStore\Contracts\ProductImportInterface;
use Modules\FresciaStore\Entities\Product\Product;
use Modules\FresciaStore\Entities\Product\ProductCategories;
use Modules\FresciaStore\Entities\Stock\StocksProducts;
use Modules\FresciaStore\Entities\Stock\SuppliersProducts;
use Modules\FresciaStore\Services\UploadProductImageService;

class FresciaStoreService implements ProductImportInterface
{
    private string $link = "https://portal.bitnetwork.ro/client/fresciastore/csvhttp.php";
    private string $fileStorage = "resource/products/products.csv";
    private string $supplierName = "FresciaStore";
    private array $failedProducts = [];

    public function callApi(string $url = "", array $attributes = [], string $method = "GET"): bool
    {

        $client = new Client();
        try {
            $response = $client->get($this->link);
            $content = $response->getBody()->getContents();

            if (!empty($content)) {
                Storage::put($this->fileStorage, $content);
                Log::stack(['slack'])->info("File write on server", [ "file" => __FILE__  ]);
                return true;
            } else {
                Log::stack(['slack'])->error("File for import is empty", [
                    "file" => __FILE__  ,
                    "data" => Carbon::now(),
                    "external_link" => $this->link
                ]);
            }
        } catch (\Exception $ex) {
            Log::stack(['slack'])->error("File for import is empty", [
                "file" => __FILE__  ,
                "line" => __LINE__,
                "error_return" => $ex
            ]);
        }
        return false;
    }

    public function import(array $products = []): bool
    {
        foreach ($products as $product) {
            $arrayCategory = explode(">", $product['department']);
            $stringCategory = end($arrayCategory);
            $getCategory = ProductCategories::where("name", strtoupper($stringCategory))->first();
            $getSupplierData = SuppliersProducts::where("name", $this->supplierName)->first();
            if ($getCategory) {
                $slug = Str::slug($product['product'], '-');
                $destinationPath = public_path('modules/fresciastore/images/products/' . $slug);
                $fileName = $product['sku'];

                $imageUrl = $product['img_url'];
                $getImage =  (new UploadProductImageService())->downloadAndSaveImage(
                    $imageUrl,
                    $destinationPath,
                    $fileName,
                    900,
                    900,
                    0

                );
                $localProduct = Product::with('stockPrice', 'stockPrice.supplier')
                    ->whereHas('stockPrice.supplier', function ($q) {
                        $q->where('name', $this->supplierName);
                    })->where('sku', $product["sku"])->first();
                if ($localProduct && $getImage) {
                    //update on current supplier
                    $localProduct->update([
                            'stockPrice.price' => $product["price"],
                            'stockPrice.quantity' => $product["stock"]
                    ]);
                    $localProduct->firstImage()->update([
                        "image" => $getImage,
//                        "product_id" => $localProduct->id,
                    ]);
                } elseif ($getImage && !$localProduct) {
                    if (mb_check_encoding($product['description'], 'UTF-8')) {
                        $newProduct = Product::create([
                            'category_id' => $getCategory->id,
                            'name' => $product['product'],
                            'sku' => $product['sku'],
                            'unit_measure' => "buc",
                            'description' => $product['description'],
                            'short_description' => $product['meta_key'],
                            'is_active' => 1,
                        ]);

                        // use relation for stoc
                        $newProduct->stockPrice()->create([
                            'quantity' => $product['stock'],
                            'price' => $product['price'],
                            'supplier_id' => $getSupplierData->id
                        ]);
                        $newProduct->firstImage()->create([
                            "image" => $getImage
                        ]);

                        $keywords = array_merge(
                            explode(' ', $product['product']),
                            explode(' ', $product['meta_description'])
                        );
                        $metaKeywords = implode(', ', array_unique($keywords));
                        // use relation for seo
                        $newProduct->seo()->create([
                            'meta_title' => $product['product'],
                            'meta_description' => $product['meta_description'],
                            'meta_keywords' => $metaKeywords
                        ]);
                    } else {
                        $this->failedProducts[$product['sku']] = [
                            "error" => "Descriere incorecta",
                            "name" => $product['product']
                        ];
                    }
                    //create product
                } else {
                    $this->failedProducts[$product['sku']] = [
                        "error" => "Imagine 404",
                        "name" => $product['product']
                    ];
                }
            }
        }
        if(sizeof($this->failedProducts) > 0) {

        }
        return false;
    }

    public function run()
    {
//        if ($this->callApi()) {
            $products = Arr::readCSVWithHeaders($this->fileStorage);
            if (sizeof($products['rows']) > 0) {
                $this->import($products['rows']);
            } else {
                Log::stack(['slack'])->error("Product list is empty", [
                    "file" => __FILE__  ,
                    "error_return" => $products
                ]);
            }
//        }
    }
}
