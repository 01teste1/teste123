Carrinho = {
    add: function addCarrinho(url) {
        $.ajax({
            type: "GET",
            url: url,
            data: "",
            success: function() {
                $('.cart-total').load(document.URL + " .cart-total ul");
            }
        });
    },

    update: function atualizarCarrinho(url) {
        $.ajax({
            type: "GET",
            url: url,
            data: "",
            success: function() {
                $('#table-carrinho').load(document.URL + " #table-carrinho");
                $('.cart-total').load(document.URL + " .cart-total ul");
            }
        });
    },

    remove: function removeCarrinho(url) {
        $.ajax({
            type: "GET",
            url: url,
            data: "",
            success: function() {
                $('#table-carrinho').load(document.URL + " #table-carrinho");
                $('.cart-total').load(document.URL + " .cart-total ul");
            }
        });
    },

    clear: function limparCarrinho(url) {
        $.ajax({
            type: "GET",
            url: url,
            data: "",
            success: function() {
                $('#table-carrinho').load(document.URL + " #table-carrinho");
                $('.cart-total').load(document.URL + " .cart-total ul");
            }
        });
    }
}

$('.preco').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});