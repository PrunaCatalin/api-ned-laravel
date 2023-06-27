var ShopCart = ns("NSWD.ShopCart");

ShopCart.changeAddress = function(obj, type = "form") {
    console.log("Params : ", obj , type);
    NSWD.WDAxios.post(APP_URL  + "/zona-client/getCustomerAddress" , {
        'address_id' : type == "form" ? obj.value : obj
    }).then(function (response) {
        $("#person_name").val(response.data.person_name);
        $("#person_lastname").val(response.data.person_lastname);
        $("#person_street_name").val(response.data.person_street_name);
        $("#person_zip_code").val(response.data.person_zip_code);
        $("#person_email").val(response.data.person_email);
        $("#person_phone").val(response.data.person_phone);
    }).catch(function (error) {
        NSWD.Logger(error);
    });
};
