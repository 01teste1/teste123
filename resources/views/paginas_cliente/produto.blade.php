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
						<div class="product-nav">
							<a href=""><i class="fa fa-angle-right"></i></a>
						</div>
						<h1 class="product_title">{{$produto->nome}}</h1>
						<div class="price-box">
							<span class="Preço">{{$produto->preco_carro}}</span>
							{{--  <span class="Preço antigo">R$ 400,00</span>  --}}
						</div>
						<div class="pro-rating">
							<a href="#"><i class="fa fa-star"></i></a>
							<a href="#"><i class="fa fa-star"></i></a>
							<a href="#"><i class="fa fa-star"></i></a>
							<a href="#"><i class="fa fa-star"></i></a>
							<a href="#"><i class="fa fa-star"></i></a>
						</div>
						<div class="short-description">
							{!! $produto->descricao !!}						
						</div>

						<!-- começo calendario-->
						<!-- fim calendario-->
						
						<form action="#">
							<div class="quantity">
								<input type="number" value="1" />
								<button type="submit">Adicionar ao carrinho</button>
							</div>
						</form>
						<div class="add-to-wishlist">
							<a href="#" data-toggle="tooltip" title="Adicionar a lista de desejos"><i class="fa fa-star"></i></a>							
						</div>
						<div class="share_buttons">
							<a href="#"><img src="img/share-img.png" alt="" /></a>
						</div>
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
	</script>
	@endsection