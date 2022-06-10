var cart = {};
$(function () {

    const link_product_id = $('.product_link_id')

    $.each(link_product_id, function () {
        $(this).bind('click', function () {
            var id_prod = $(this).attr('data-id');

            const prodPlus = id => {
                if (cart[id_prod] == undefined) {
                    cart[id_prod] = 1;
                }else {
                    cart[id_prod] ++;
                }
                renderCart();
            };
        });
    });
});

const renderCart = () => {
    console.log(cart);
}
//function basket() {
  //  return String(cart);
//};