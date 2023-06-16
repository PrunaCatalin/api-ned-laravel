<?php

namespace Modules\FresciaStore\Services\Product;

use Illuminate\Http\Request;
use Modules\FresciaStore\Entities\Product\Product;
use Modules\FresciaStore\Entities\Product\ProductCategories;
use Modules\FresciaStore\Http\Requests\Shop\ShopRequest;

class ProductService
{
    /**
     * @param Request|null $request
     * @return array
     */
    public function getProductsAndCategories($slug = null, ?ShopRequest $request = null): array
    {

        $categories = ProductCategories::with('allChildren')
            ->withCount('products')
            ->where('id_parent', 0)->get();
        $perPage = 12;
        $page = 1;
        if ($request && $request->has('Product.max-page-filter')) {
            $perPage = $request->input('Product.max-page-filter');
        }
        if ($request && $request->get('page')) {
            $page = $request->get('page');
        }

        $products = Product::with('lowestStockPrice', 'highestStockPrice', 'firstImage', 'category', 'stockPrice')
            ->whereHas('category', function ($q) use ($slug) {
                if ($slug) {
                    $q->where("url_seo", $slug);
                }
            })->whereHas('stockPrice', function ($q) use ($request) {
                if ($request && $request->has('Product.stock-filter')) {
                    $stock = $request->input('Product.stock-filter');
                    if ($stock == "in-stoc") {
                        $q->where("quantity", ">", 0);
                    } elseif ($stock == "fara-stoc") {
                        $q->where("quantity", "=", 0);
                    }
                }
            })->where(function ($q) use ($request) {
                if ($request && $request->has('Product.name') && strlen($request->input('Product.name')) > 3) {
                    $q->where('name', 'like', "%" . $request->input('Product.name') . "%");
                }
            })->paginate($perPage, '*', 'page', $page);
        return compact('categories', 'products');
    }
}
