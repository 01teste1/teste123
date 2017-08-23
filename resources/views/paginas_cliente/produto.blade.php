@extends('main')
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
					<div class="single-product-image">
						<div class="single-product-tab">
						  <!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><img alt="" src="img/product/tab/s1.jpg"></a></li>
							<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><img alt="" src="img/product/tab/s2.jpg"></a></li>
							<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><img alt="" src="img/product/tab/s3.jpg"></a></li>
							<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><img alt="" src="img/product/tab/s4.jpg"></a></li>
						  </ul>

						  <!-- Tab panes -->
						  <div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home"><img alt="" src="img/product/tab/1.jpg"></div>
							<div role="tabpanel" class="tab-pane" id="profile"><img alt="" src="img/product/tab/2.jpg"></div>
							<div role="tabpanel" class="tab-pane" id="messages"><img alt="" src="img/product/tab/3.jpg"></div>
							<div role="tabpanel" class="tab-pane" id="settings"><img alt="" src="img/product/tab/4.jpg"></div>
						  </div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="single-product-info">
						<div class="product-nav">
							<a href="#"><i class="fa fa-angle-right"></i></a>
						</div>
						<h1 class="product_title">{{$produto->nome}}</h1>
						<div class="price-box">
							<span class="Preço">{{$produto->preco_carro}}</span>
							<span class="Preço antigo">R$ 400,00</span>
						</div>
						<div class="pro-rating">
							<a href="#"><i class="fa fa-star"></i></a>
							<a href="#"><i class="fa fa-star"></i></a>
							<a href="#"><i class="fa fa-star"></i></a>
							<a href="#"><i class="fa fa-star"></i></a>
							<a href="#"><i class="fa fa-star"></i></a>
						</div>
						<div class="short-description">
							{{$produto->descricao}}						
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
								{{$produto->detalhe}}
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