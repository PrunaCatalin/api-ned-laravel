
<div class="col-md-4 col-sm-4 col-xs-6">
    <div class="thumbnail no-border no-padding">
        <div class="media">
            <a class="media-link" href="#">
                <img style="height: 250px"
                    src="{{ asset("modules/fresciastore/images" , true) . "/products/". Str::slug($product->name) . "/" . $product->firstImage->image}}"
                    alt="">
            </a>
        </div>
        <div class="caption text-center">
            <h4 class="caption-title">{{ $product->shop_name }}</h4>
            <div class="rating">
                <span class="star active"></span>
                <span class="star active"></span>
                <span class="star active"></span>
                <span class="star active"></span>
                <span class="star"></span>
            </div>
            @if($product->stockPrice &&  $product->stockPrice->quantity > 0)
                <div class="quantity-input">
                    <button type="button" onclick="NSWD.ShopPage.decrementQuantity({{ $product->id }})">-</button>
                    <input type="number"
                           id="quantity_{{ $product->id }}"
                           data-min="1"
                           data-max="{{ $product->stockPrice->quantity }}"
                           disabled="true"
                           value="1">
                    <button type="button" onclick="NSWD.ShopPage.increaseQuantity({{ $product->id }})">+</button>
                </div>
            @else
                <div class="quantity-input">
                    <button disabled="true">-</button>
                    <input type="number" id="quantity" min="0" max="0" value="0">
                    <button disabled="true">+</button>
                </div>
            @endif
            <div class="price">
                @if($product->stockPrice && $product->stockPrice->quantity > 0)
                    <ins>{{ $product->stockPrice->price }}</ins>
                @else
                    <ins>Fara Stoc</ins>
                @endif

            </div>
            <div class="add-to-cart">
                <a href="javascript:;" class="btn btn-outline-black" onclick="NSWD.ShopPage.addToCart({{ $product->id }})">ADAUGA IN COS</a>
            </div>
        </div>
    </div>
</div>
