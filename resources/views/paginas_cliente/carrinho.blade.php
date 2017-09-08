@extends('main')
@section('title','carrinho')
@section('content')

	<!-- entry-header-area start -->
	<div class="entry-header-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="entry-header">
						<h1 class="entry-title">Carrinho</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- entry-header-area end -->

	<!-- cart-main-area start -->
	<div class="cart-main-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<form action="#" id="table-carrinho">				
						<div class="table-content " id="no-more-tables">
							<table >
								<thead>
									<tr>
										<th class="product-thumbnail">Imagem</th>
										<th class="product-name">Item/ passeio</th>
										<th class="product-price">Preço</th>
										<th class="product-quantity">Quantidade</th>
										<th class="product-subtotal">Subtotal</th>
										<th class="product-remove">Remover</th>
									</tr>
								</thead>
								<tbody >
									@foreach(Cart::content() as $row)
										<tr>
											<td class="product-thumbnail" data-title="Imagem"><img src="{{asset($row->options['imagem'])}}" alt="" /></td>
											<td class="product-name" data-title="Nome"><a href="#">{{$row->name}}</a></td>
											<td class="product-price" data-title="Preço"><span class="amount">R$ {{$row->price(2,',','.')}}</span></td>
											<td class="product-quantity" data-title="Quantidade">										
												<select onChange="qtdCarrinho(this,'{{ $row->rowId }}')">
													@for ($i = 1; $i <= 5; $i++)
														<option {{ $row->qty == $i ? 'selected' : '' }} value="{{$i}}">{{$i}}</option>
													@endfor
												</select>
											</td>
											<td class="product-subtotal" data-title="Subtotal">R$ {{$row->total(2,',','.')}}</td>
											<td class="product-remove" data-title="Remover"><a href="#" onClick="Carrinho.remove('{{ route('produto.removerDoCarrinho',$row->rowId) }}')"><i class="fa fa-times"></i></a></td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col-md-8 col-sm-7 col-xs-12">
								<div class="buttons-cart">
									<a href="/pacotes">Continuar Comprando</a>
									<a href="javascript:void(0);" onClick="Carrinho.clear('{{ route('produto.limparCarrinho',$row->rowId) }}')">Limpar Carrinho</a>
								</div>
								
							</div>
							<div class="col-md-4 col-sm-5 col-xs-12">
								<div class="cart_totals">
									<h2>Total da Compra</h2>
									{{--  <table>
										<tbody>
											<tr class="cart-subtotal">
												<th>Subtotal</th>
												<td><span class="amount preco">£215.00</span></td>
											</tr>
											<tr class="shipping">
												<th>Shipping</th>
												<td>
													<ul id="shipping_method">
														<li>
															<input type="radio" /> 
															<label>
																Flat Rate: <span class="amount">R$ {{Cart::tax(2,',','.')}}</span>
															</label>
														</li>
														<li>
															<input type="radio" /> 
															<label>
																Free Shipping
															</label>
														</li>
														<li></li>
													</ul>
													<p><a class="shipping-calculator-button" href="#">Calculate Shipping</a></p>
												</td>
											</tr>
											<tr class="order-total">
												<th>Total</th>
												<td>
													<strong><span class="amount ">R$ {{Cart::total(2,',','.')}}</span></strong>
												</td>
											</tr>											
										</tbody>
									</table>  --}}
									<div class="order-total">
										<h2>Total</h2>
										<strong><span class="amount">R$ {{Cart::total(2,',','.')}}</span></strong>
									</div>
									<div class="wc-proceed-to-checkout">
										<a href="/checkout">Finalizar Compra</a>
									</div>
								</div>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
	<!-- cart-main-area end -->	
	
	<!-- footer start -->

	<!-- footer end -->

		<!-- JS -->
		
	@endsection

	@section('scripts')
	<script>
		function qtdCarrinho(id,row){
			var qtd = id.value;
			Carrinho.update(" {{ url('/carrinho/atualizar/') }}"+'/'+ row + '/' + qtd);
		}			
			 
	</script>
	@endsection