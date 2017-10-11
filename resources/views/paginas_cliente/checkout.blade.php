@extends('main')
@section('title','pagamento')
@section('content')

	<!-- checkout-area start -->
	<div class="checkout-area">
		<div class="container">
			<div class="row">
				<form id="pagamento" action="" method="POST">
				{{ csrf_field() }}
					<div class="col-lg-6 col-md-6">
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
					<div class="col-lg-6 col-md-6">
						<div class="your-order">
							<h3>Seu Pedido</h3>
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
									<h3>Formas de Pagamentos</h3>
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
		$('#pagamento').one('submit', function(e) {
			e.preventDefault();
			var dados = $(this).serializeArray();
			$.ajax({
				type: "POST",
				url: "{{url('pedido')}}",
				data: dados,
				success: function(code) {									
					{{--  PagSeguroLightbox(code);  --}}
				}
			});	
		});
	</script>
	@endsection