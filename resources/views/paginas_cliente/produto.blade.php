@extends('main')
@section('custom-css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/lightslider.min.css') }}" />
@endsection
@section('title','produto')
@section('content')
		<!-- header-mid-area end -->
		<!-- mainmenu-area start -->
		
	<!-- header end -->
	<!-- breadcrumb-area start -->
	<div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="breadcrumb">
						<ul>
							<li><a href="index.html">Home</a> <i class="fa fa-angle-right"></i></li>
							<li><a href="shop.html">Shop</a> <i class="fa fa-angle-right"></i></li>
							<li><a href="#">Women</a> <i class="fa fa-angle-right"></i></li>
							<li>Integer consequat ante lectus</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- breadcrumb-area end -->
	<!-- product-simple-area start -->
	<div class="product-simple-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					{{--  <div class="single-product-image">  --}}
						{{--  <div class="single-product-tab">
						  <!-- Tab panes -->
						  <div class="col-lg-10">
						  <div class="tab-content">
							@foreach($imagens as $key => $imagem)								
									<div role="tabpanel" @if($key == 0) class="tab-pane active" @else class="tab-pane" @endif id="imagem-{{$key}}"><img alt="" src="{{asset($imagem->nome)}}"></div>
							@endforeach
						  </div>						  
						  </div>
						  	<!-- Nav tabs -->
							<div class="col-lg-2">
							<ul class="nav nav-tabs" role="tablist">						
								@foreach($imagens as $key => $imagem)								
									
									<li role="presentation" @if($key == 0) class="active" @endif><a href="#imagem-{{$key}}" aria-controls="#imagem-{{$key}}" role="tab" data-toggle="tab"><img alt="" src="{{asset($imagem->nome)}}"></a></li>
									
								@endforeach							
							</ul>
							</div>						  
						  	
						</div>
					</div>  --}}
					<ul id="imageGallery">
						@foreach($imagens as $key => $imagem)
							<li data-thumb="{{asset($imagem->nome)}}">
								<img src="{{asset($imagem->nome)}}" />
							</li>
						@endforeach
					</ul>
					
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="single-product-info">
						
						<form action="" id="form-prod" method="GET">						
							<h1 class="product_title">{{$produto->nome}}</h1>
							<div class="price-box">
								@foreach($produto->veiculos as $key => $veiculo)
									<span class="Preço preco" data-id="{{$veiculo->id}}">{{$veiculo->pivot->preco}}</span>
									@if(!$loop->last)
										<span class="Preço hifen"> - </span>
									@endif
								@endforeach
							</div>
							
							<div class="tipo-carro">							
								<h4>Selecione o Veículo</h4>
								@foreach($produto->veiculos as $key => $veiculo)													
									<input data-qtd-veic="{{$veiculo->qtd}}" data-qtd-passageiros="{{$veiculo->capacidade}}" id="{{$veiculo->nome}}" type="radio" name="veiculo" value="{{$veiculo->id}}" >
									<label for="{{$veiculo->nome}}" class="{{$veiculo->nome}}"></label>
								@endforeach
							</div>
							<!-- começo calendario-->						
							<div class="calendar">
								<h4>Data: </h4>						
								<input id="calendario" name="data" readyonly class="calendario" data-date-format="d/m/Y">
							</div>
							<!-- fim calendario-->

							<div class="quantity">
								<h4>Quantidade de Veículos: </h4>
								<select id="qtd" name="quantidade" class="form-control">						
								</select>	

								<!-- começo hora-->							
								<div class="hour">
									<h4>Horário: </h4>	
									<select name="horario" class="form-control">
										<option>Selecione</option>							
										<option value="08:00">08:00</option>
										<option value="08:30">08:30</option>
										<option value="09:00">09:00</option>
										<option value="09:30">09:30</option>
										<option value="10:00">10:00</option>
										<option value="10:30">10:30</option>
										<option value="11:00">11:00</option>
										<option value="11:30">11:30</option>
										<option value="12:00">12:00</option>
										<option value="12:30">12:30</option>
										<option value="13:00">13:00</option>
										<option value="13:30">13:30</option>
										<option value="14:00">14:00</option>
										<option value="14:30">14:30</option>
									</select>					
								</div>
							
							<button id="addProd" onClick="Carrinho.add('{{ route('produto.addCarrinho',$produto->id) }}')">Adicionar ao carrinho</button>
								
									<div id="form-errors"></div>
													
							</div>
													
							{{--  <div class="add-to-wishlist">
								<a href="#" data-toggle="tooltip" title="Adicionar a lista de desejos"><i class="fa fa-star"></i></a>							
							</div>  --}}
							<div class="share_buttons">
								<a href="#"><img src="img/share-img.png" alt="" /></a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- product-simple-area end -->
	<div class="product-tab-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-9">
					<div class="product-tabs">
						<div>
						  <!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#tab-desc" aria-controls="tab-desc" role="tab" data-toggle="tab">Descrição</a></li>
							<li role="presentation"><a href="#page-comments" aria-controls="page-comments" role="tab" data-toggle="tab">Avaliações (1)</a></li>
						  </ul>
						  <!-- Tab panes -->
						  <div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="tab-desc">
								<div class="product-tab-desc">
									{!! $produto->detalhes !!}
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="page-comments">
								<div class="product-tab-desc">
									<div class="product-page-comments">
										<h2>1 review for Integer consequat ante lectus</h2>
										<ul>
											<li>
												<div class="product-comments">
													<img src="img/blog/avatar.png" alt="" />
													<div class="product-comments-content">
														<p><strong>admin</strong> -
															<span>March 7, 2015:</span>
															<span class="pro-comments-rating">
																<i class="fa fa-star"></i>								
																<i class="fa fa-star"></i>								
																<i class="fa fa-star"></i>								
																<i class="fa fa-star"></i>								
															</span>
														</p>
														<div class="desc">
															Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.
														</div>
													</div>
												</div>
											</li>
										</ul>
										<div class="review-form-wrapper">
											<h3>Add a review</h3>
											<form action="#">
												<input type="text" placeholder="your name"/>
												<input type="email" placeholder="your email"/>
												<div class="your-rating">
													<h5>Your Rating</h5>
													<span>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
													</span>
													<span>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
													</span>
													<span>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
													</span>
													<span>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
													</span>
												</div>
												<textarea id="product-message" cols="30" rows="10" placeholder="Your Rating"></textarea>
												<input type="submit" value="submit" />
											</form>
										</div>
									</div>
								</div>
							</div>
						  </div>
						</div>						
					</div>
					<div class="clear"></div>
					
				</div>
				
			</div>
		</div>
	</div>
	
	@endsection
	@section('scripts')

		<script src="{{ asset('js/lightslider.min.js') }}"></script>
		<script type="text/javascript">

			$('#imageGallery').lightSlider({
				gallery:true,
				loop:true,
				item:1,
				adaptiveHeight:true,
				thumbItem: 6,
			});

			const fp = $('.calendario').flatpickr({
				locale: 'pt',
				inline: true,
				enable: ['today'],
				allowInput: false,
				minDate: new Date().fp_incr(2),
				onChange: function(dateStr,dateFormat){					
					changeQtdVeic(dateFormat,qtdPassageiro);
				}
    		}); 		
		
		var datas = [];
		var vendidos;
		var qtdPassageiro;
		var qtd_veic;

		$('.tipo-carro input').click(function (e) {			
			$('.tipo-carro input:not(:checked)').next().removeClass("selected");
			$('.tipo-carro input:checked').next().addClass("selected");
			
			
			qtdPassageiro = $(".tipo-carro input:checked").data('qtd-passageiros');
			qtd_veic = $(".tipo-carro input:checked").data('qtd-veic');
			veic = $(".tipo-carro input:checked").val();
			
			$('.price-box .preco').each(function() {
				if($(this).data('id') == veic){
					$(this).show();
				}else{
					$(this).hide();
				}
				$(".hifen").hide();
            });



			fp.clear();	
			$.ajax({
					type: "GET",
					url: "{{ url('/produto/data')}}/{{Request::segment(2)}}",
					data: {data:veic},
					async: true,
					success: function(elem) {									
						datas = elem.bloqueado;
						vendidos = elem.vendidos;
					}
				}).done(function(){					
					if(typeof datas !== 'undefined'){
						fp.set('disable',datas);
					}else{
						fp.set('disable',['today']);						
					}
					fp.set('enable',['']);
				});	
		});

		function changeQtdVeic(data){		
			
			if(typeof vendidos !== 'undefined'){
				var result = jQuery.inArray(data,vendidos.data);
				var qtd = vendidos.qtd[result];
			}
			if(typeof qtd == 'undefined')
			{
				qtd = qtd_veic;
			}

			$('#qtd').html('');
			for(i=1; i <= qtd; i++)
				{					
					if(i <= 1){
						$('#qtd').append($("<option></option>").val(i).html(i + " Veículo para "+ qtdPassageiro * i + " pessoas"));
					}else{
						$('#qtd').append($("<option></option>").val(i).html(i + " Veículos para "+ qtdPassageiro * i + " pessoas"));
					}
				}
		}

		</script>
	@endsection