@extends('main')
@section('title','pagamento')
@section('content')

	<!-- checkout-area start -->
	<div class="checkout-area">
		<div class="container">
			<div class="row">
				<form id="pagamento" action="" method="POST">
				{{ csrf_field() }}
					<div class="col-lg-5 col-md-6">
						<div class="checkbox-form">						
							<h3>Dados do Cliente</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="country-select">
										<label>Cidade <span class="required">*</span></label>
										<select name="cidade">
										  <option value="CamposdoJordao">Campos do Jordão</option>									 
										</select> 										
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkout-form-list">
										<label>Nome <span class="required">*</span></label>										
										<input name="nome-cliente" type="text" placeholder="" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkout-form-list">
										<label>Sobrenome <span class="required">*</span></label>										
										<input name="sobrenome-cliente" type="text" placeholder="" />
									</div>
								</div>
								<div class="col-md-12">
									<div class="checkout-form-list">
										<label>Nome do Hotel<span class="required">*</span></label>
										<input name="nome-hotel" type="text" placeholder="" />
									</div>
								</div>
								<div class="col-md-12">
									<div class="checkout-form-list">
										<label>Endereço do Hotel/Pousada <span class="required">*</span></label>
										<input name="end-hotel" type="text" placeholder="Rua, numero, bairro." />
									</div>
								</div>
								<div class="col-md-12">
									<div class="checkout-form-list">
										<label>Observações</label>									
										<input name="obs" type="text" placeholder="" />
									</div>
								</div>								
								<div class="col-md-6">
									<div class="checkout-form-list">
										<label>Email  <span class="required">*</span></label>										
										<input name="email" type="email" placeholder="" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkout-form-list">
										<label>Telefone  <span class="required">*</span></label>										
										<input name="telefone" type="text" placeholder="" />
									</div>
								</div>							
							</div>
																				
						</div>
					</div>	
					<div class="col-lg-7 col-md-6">
						<div class="your-order">
							<h3>Pagamento PagSeguro</h3>
							<div id="pagseguro_container">
								<div class="well">
									<div class="row pagseguro-payment-options">
										<div class="col-md-4 pagseguro_card_brands">
											<div>
												<label>
													<input type="radio" class="pagseguro_radio" name="pagseguro[option]" value="creditCard" checked>
													Cartão de crédito
												</label>
											</div>
											<div>
												<label>
													<input type="radio" class="pagseguro_radio" name="pagseguro[option]" value="boleto">
													Boleto
												</label>
											</div>
											{{--  <div>
												<label>
													<input type="radio" class="pagseguro_radio" name="pagseguro[option]" value="eft">
													Debito Online
												</label>
											</div>  --}}
										</div>
										<div class="col-md-8">
											<div class="pagseguro-form pagseguro-eft" style="display:none;">
												<label>Banco</label>
												<select name="pagseguro[bankName]">	
													<option value="bradesco">Bradesco</option>
													<option value="itau">Itau</option>
													<option value="bancodobrasil">Banco do Brasil</option>
													<option value="banrisul">Banrisul</option>
												</select>
											</div>
											<div class="pagseguro-form pagseguro-boleto" style="display:none;">
												Você vai ser redirecionado para a página do Boleto ao clicar "Finalizar compra"
											</div>
											<div class="pagseguro-form pagseguro-creditCard">
												<div class="form-group">
													<div class="row">
													<div id="form-errors"></div>
														<div class="col-md-7 form-group">
															<label>Número  do Cartão</label>
															<input name="numeroCartao" class="pagseguro_cc_card_num form-control" type="text" placeholder="" maxlength="16" />
														</div>
														<div class="col-md-5 form-group">
															<label>Validade</label>
															<div class="form-inline">
																<input name="mesCartao" class="validade form-control pagseguro_cc_exp_date_mm" type="text" placeholder="MM" maxlength="2" />
																<input name="anoCartao" class="validade form-control pagseguro_cc_exp_date_yy" type="text" placeholder="AA" maxlength="4" />								
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-7 form-group">
															<label>Codigo de Segurança 
															<a tabindex="0" role="button" data-toggle="popover" data-trigger="focus"><kbd> ? </kbd></a>
															</label>
															<input name="cvv" class="validade form-control pagseguro_cc_card_code" type="text" placeholder="" maxlength="4" />							                                
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<label>Nome do dono do cartão</label>
															<input name="pagseguro[cc_holder]" class="nome form-control" type="text" placeholder="" maxlength="" />
															<span id="helpBlock" class="help-block">ex: José Carlos S de Souza.</span>
														</div>							                            
														<div class="col-md-12">
															<label>CPF</label>	
															<input name="cpf" class="nome form-control" type="text" placeholder="" maxlength="" />
														</div>
														<div class="col-md-12">
															<label>Data de Nascimento dono do Cartão</label>	
															<input name="pagseguro[data_nascimento]" class="nome form-control" type="text" placeholder="DD/MM/AAAA" maxlength="" />
														</div>
													</div>
												</div>
												<div class="form-group">
													<label>Parcelamento</label>
													<div class="pagseguro-installments-info">Pague em até <b>12x</b></div>
													<select name="pagseguro[installments]" class="form-control">
													<option>Escolha o número de parcelas</option>
													</select>
												</div>
												<span id="helpBlock" class="help-block">*Todos os campos são obrigatórios</span>
												<h4><b>Endereço de Cobrança</b></h4>
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<label>Nome do dono do cartão</label>
															<input name="pagseguro[cc_holder]" class="nome form-control" type="text" placeholder="" maxlength="" />
															<span id="helpBlock" class="help-block">ex: José Carlos S de Souza.</span>
														</div>							                            
														<div class="col-md-12">
															<label>CPF</label>	
															<input name="cpf" class="nome form-control" type="text" placeholder="" maxlength="" />
														</div>
														<div class="col-md-12">
															<label>Data de Nascimento dono do Cartão</label>	
															<input name="pagseguro[data_nascimento]" class="nome form-control" type="text" placeholder="DD/MM/AAAA" maxlength="" />
														</div>
													</div>
												</div>				
											</div>
											
											
										</div>
									</div>
								</div>
							</div>
							<div class="your-order-table table-responsive">
								<table>
									<tfoot>
										<tr class="order-total">
											<th>Total do Pedido</th>
											<td><strong><span class="amount">R$ {{Cart::total(2,',','.')}}</span></strong>
											</td>
										</tr>								
									</tfoot>
								</table>
							</div>
							<div class="payment-method">
								<div class="payment-accordion">
									<!-- ACCORDION START -->
									{{--  <h3>Formas de Pagamentos</h3>  --}}
									<div class="payment-content">
										
									</div>									
								</div>
								<div class="order-button-payment">
									<input type="submit" value="Realizar Pagamento" />									
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- checkout-area end -->	
	
	@endsection

	@section('scripts')
	<script>
	var dadosForm = "";
	var paymentModule = 'pagseguro_app';
		$('#pagamento').one('submit', function(e) {
			e.preventDefault();
			dadosForm = $(this).serializeArray();	

			pagseguroCheckout();			
		});

		$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

	PagSeguroDirectPayment.setSessionId('{{ PagSeguro::startSession() }}');

	function submitForm(){
			dadosForm.push({
				name:'creditCardToken',
				value: creditCardToken
			},{
				name: 'senderHash',
				value: senderHash
			});
		$.ajax({
			type: "POST",
			url: "{{url('pedido')}}",
			data: dadosForm,
			success: function(code) {									
				{{--  PagSeguroLightbox(code);  --}}
			}
		});	
	}
    function pagseguroCheckout() {			
            senderHash = PagSeguroDirectPayment.getSenderHash();
            $('input[name=pagseguro\\[senderHash\\]]').val(senderHash);

            if ($('input[name=pagseguro\\[option\\]]:checked').val() == 'creditCard') {
				
                if ($('input[name=pagseguro\\[creditCardToken\\]]').val().length == 0) {
                        var param = {
                            brand: $('input[name=pagseguro\\[brand\\]]').val(),
                            cardNumber: $('.pagseguro_cc_card_num').val(),
                            cvv: $('.pagseguro_cc_card_code').val(),
                            expirationMonth: $('.pagseguro_cc_exp_date_mm').val(),
                            expirationYear: $('.pagseguro_cc_exp_date_yy').val(),
                            success: function(response) {
                                {{--  $('input[name=pagseguro\\[creditCardToken\\]]').val(response.card.token);  --}}
								creditCardToken = response.card.token;
								$('#form-errors').hide();
								submitForm();
                            },
                            error: function(response) {
								$('#form-errors').append('<div class="alert alert-danger"><p>Cartão de crédito inválido. Não conseguimos processar seu pedido.</p></div>')
                            },
							complete: function(response) {
    						}
                        }
                        PagSeguroDirectPayment.createCardToken(param);
                    }        
            }
    }

    function pagseguroValidateCard (element, bypassLengthTest) {
        $('input[name=pagseguro\\[creditCardToken\\]]').val('');
        var cardNum = $(element).val().replace(/[^\d.]/g, '');
        var card_invalid = 'Validamos os primeiros 6 números do seu cartão de crédito e está inválido. Por favor esvazie o campo e tente digitar de novo.';

        if (cardNum.length == 6 || (bypassLengthTest && cardNum.length >= 6)) {
            PagSeguroDirectPayment.getBrand({
            cardBin: cardNum.substr(0, 6),
            success: function(response) {
                if (typeof response.brand.name != 'undefined') {

                    $('input[name=pagseguro\\[brand\\]]').val(response.brand.name);

                    PagSeguroDirectPayment.getInstallments({
                        amount: "{{Cart::total()}}",
                        brand: response.brand.name,
                        success: function(response1) {
                            $('select[name=pagseguro\\[installments\\]]').html('');
                            $.each(response1.installments[response.brand.name], function(key, value){
                                $('select[name=pagseguro\\[installments\\]]').append('<option value="'+value.quantity+'x'+value.installmentAmount.toFixed(2)+'">'+value.quantity+' vezes R$ '+value.installmentAmount.toFixed(2).replace('.', ',')+' (Total: '+value.totalAmount.toFixed(2).replace('.', ',')+') - ' + response.brand.name.toUpperCase() + '</option>');
                            });
                            $('.pagseguro-installments').show();
                            $('.pagseguro-installments-info').hide();
                        },
                        error: function(){
                            alert(card_invalid);
                        }
                    });

                }else{
                    alert(card_invalid);
                }
            },
            error: function(response) {
                alert(card_invalid);
            }});
        }
    }

    $(document).ready(function(){

		$('[data-toggle="popover"]').popover({
			html: true,
			title: "<h5>Segurança do Cartão</h5>",
			content : '<p>Para sua segurança, solicitamos que informe alguns números do seu cartão de crédito.</p><dl><dt>Onde encontrar?</dt><dd><img src="https://stc.pagseguro.uol.com.br/pagseguro/i/checkout-presentation/cvv/default.png" alt="">Informe os <strong>três últimos números localizados</strong> no verso do cartão.</dd></dl>'
		});

        $('.pagseguro_cc_card_num').keyup(function(){
            pagseguroValidateCard(this, false);
        });
        $('.pagseguro_cc_card_num').focusout(function(){
            pagseguroValidateCard(this, true);
        });
        $('input.pagseguro_radio').change(function(){
            $('.pagseguro-form').hide();
            $('.pagseguro-' + $('input.pagseguro_radio:checked').val() ).show();
        });

				$('<input>').attr({
			type: 'hidden',
			id: 'brand',
			name: 'pagseguro[brand]'
		}).appendTo('form');
		$('<input>').attr({
			type: 'hidden',
			id: 'sender',
			name: 'pagseguro[senderHash]'
		}).appendTo('form');
		$('<input>').attr({
			type: 'hidden',
			id: 'cardtoken',
			name: 'pagseguro[creditCardToken]'
		}).appendTo('form');

    });


	</script>
	@endsection