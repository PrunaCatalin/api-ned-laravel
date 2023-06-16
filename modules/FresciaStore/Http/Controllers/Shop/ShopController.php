<?php

namespace Modules\FresciaStore\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\FresciaStore\Http\Requests\Shop\ShopRequest;
use Modules\FresciaStore\Services\Product\ProductService;

class ShopController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function view(?ShopRequest $request)
    {
        $data = $this->productService->getProductsAndCategories(null, $request);
        return view('fresciastore::shop.shop-page', $data);
    }
}
