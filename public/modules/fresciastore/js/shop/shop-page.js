// For Filters
var ShopPage = ns("NSWD.ShopPage");


ShopPage.loadObjects = function() {

    $('.arrow').click(function() {
        var target = $(this).data('target');
        $(target).toggle();
    });
};
NSWD.Loader.windowReady(ShopPage.loadObjects);

ShopPage.increaseQuantity = function (product_id) {
    var quantity = $("#quantity_" + product_id);
    if(quantity !== undefined && product_id){
        var value = parseInt(quantity.val());
        if(parseInt(quantity.attr('data-max')) > value)  quantity.val(value + 1);
    }

}

ShopPage.decrementQuantity = function (product_id) {
    var quantity = $("#quantity_" + product_id);
    if(quantity !== undefined && product_id){
        var value = parseInt(quantity.val());
        if(value > 0 )  quantity.val(value - 1);
    }
}
ShopPage.pagination = function (page) {
    var currentForm = $("#shop-form");
    currentForm.attr('action' , page);
    currentForm.submit();

}
ShopPage.addToCart = function(product_id = 0) {
    var quantity = $("#quantity_" + product_id);
    if(quantity !== undefined && product_id){
        NSWD.WDAxios.post(SHOP_URL + "/addToCart" , {
            'product_id' : product_id ,
            'quantity' : parseInt(quantity.val())
        }).then(function (response) {
            $("#cart-count-mobile").html(response.data.total_products);
            $("#cart-count-desktop").html(response.data.total_products);
            alert('Cos actualizat cu success');
        }).catch(function (error) {
            NSWD.Log(error);
        });
    }
};

