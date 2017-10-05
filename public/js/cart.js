Carrinho = {
    add: function addCarrinho(url) {
        $('#form-prod').one('submit', function(e) {
            e.preventDefault();
            var dados = $(this).serializeArray();
            var qtdVeic = $('#qtd option').size();

            dados.push({ name: 'qtdVeic', value: qtdVeic });

            $.ajax({
                type: "GET",
                url: url,
                data: dados,
                success: function(dados) {
                    if (dados) {
                        errors = dados; //this will get the errors response data.
                        //show them somewhere in the markup
                        //e.g
                        errorsHtml = '<div class="alert alert-danger"><ul>';

                        $.each(errors, function(key, value) {
                            errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                        });
                        errorsHtml += '</ul></di>';

                        $('#form-errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
                    } else {
                        $('.cart-total').load(document.URL + " .cart-total ul");
                        $('#form-errors').html('')
                    }
                }
            });
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