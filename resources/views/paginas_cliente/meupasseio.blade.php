@extends('main')
@section('title','meus passeios')
@section('content')

	<!-- entry-header-area start -->
	<div class="entry-header-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="entry-header">
						<h1 class="entry-title">Parabéns - Seu pedido foi realizado</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- entry-header-area end -->

	
	<div class="pedido-main-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<strong>Pedido </strong> <span>#100</span> <br>
					<strong>Valor Total </strong> <span>R$ 220,00</span> <br>
					<strong>Data da compra </strong> <span>14/02/2018</span><br>
					<strong>Status </strong> <span>Pagamento Pendente</span><br>
					<strong>Nome </strong> <span>Rafael</span><br>
					<strong>Telefone </strong> <span>(12) 99652-5478</span><br>
					<strong>Email </strong> <span>rafael@email.com</span><br>	
					<strong>Hotel/Pousada </strong> <span>Pousada do Sol</span><br>	
					<strong>Endereço </strong> <span>Capivari. Macedo Soares 157</span><br>	
					<strong>Obs </strong> <span>Vou estar de camisa vermelha</span><br>	<br>
					<div class="table-responsive">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<th>Pedido #100</th>								
								</tr>							
								<tr>
									<td>Passeio Aventura</td>
									<td>11:00</td>
									<td>Van</td>
									<td>R$ 100,00</td>
								</tr>
								<tr>
									<td>Passeio Religioso</td>
									<td>15:00</td>
									<td>Van</td>
									<td>R$ 120,00</td>
								</tr>								
							</tbody>
						</table>
					</div>
				</div>				
			</div>
		</div>
	</div>
	
	<!-- footer start -->

	<!-- footer end -->

	<!-- JS -->
		
	@endsection

	@section('scripts')

	@endsection