@extends('main')
@section('title','pacote')
@section('content')
	<!-- shop-header-area start -->	

	<div class="shop-header-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="shop-header-title">
						<h1>Shop All Products</h1>
						<div class="shop-menu">
							<ul>
								<li><a href="#">All</a></li>
								<li><a href="#">Clothes</a></li>
								<li><a href="#">Dress</a></li>
								<li><a href="#">Handbag</a></li>
								<li><a href="#">Hats</a></li>
								<li><a href="#">Men</a></li>
								<li><a href="#">Women</a></li>
							</ul>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop-header-area end -->	
	<!-- breadcrumb-area start -->
	<div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="breadcrumb">
						<ul>
							<li><a href="index.html">Home</a> <i class="fa fa-angle-right"></i></li>
							<li>Shop</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- breadcrumb-area end -->
	
	<!-- blog-area start -->
	<div class="shop-area">
		<div class="container">
			<div class="row">
				<!-- shop-left-sidebar start -->
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<!-- widget-categories start -->
					<aside class="widget widget-categories">
						<h3 class="sidebar-title">Categories</h3>
						<ul class="sidebar-menu">
							<li><a href="#">Clothes</a> <span class="count">(14)</span></li>
							<li><a href="#">Men</a> <span class="count">(9)</span></li>
							<li><a href="#">Shoes</a> <span class="count">(2)</span></li>
							<li><a href="#">Sunglasses</a> <span class="count">(2)</span></li>
							<li><a href="#">Women</a> <span class="count">(8)</span></li>
						</ul>
					</aside>
					<!-- widget-categories end -->
					<!-- shop-filter start -->
					<aside class="widget shop-filter">
						<h3 class="sidebar-title">price</h3>
						<div class="info_widget">
							<div class="price_filter">
								<div id="slider-range"></div>
								<div class="price_slider_amount">
									<input type="text" id="amount" name="price"  placeholder="Add Your Price" />
									<input type="submit"  value="Filter"/>  
								</div>
							</div>
						</div>							
					</aside>
					<!-- shop-filter end -->
					<!-- filter-by start -->
					<aside class="widget filter-by">
						<h3 class="sidebar-title">Filter by</h3>
						<ul class="sidebar-menu">
							<li><a href="#">L</a> <span class="count">(1)</span></li>
							<li><a href="#">M</a> <span class="count">(1)</span></li>
							<li><a href="#">S</a> <span class="count">(1)</span></li>
							<li><a href="#">XL</a> <span class="count">(1)</span></li>
						</ul>						
					</aside>
					<!-- filter-by end -->
					<!-- widget-tags start -->
					<aside class="widget widget-tags">
						<h3 class="sidebar-title">Tags</h3>
						<ul>
							<li><a href="#">asian</a></li>
							<li><a href="#">brown</a></li>
							<li><a href="#">euro</a></li>
							<li><a href="#">fashion</a></li>
							<li><a href="#">france</a></li>
							<li><a href="#">hat</a></li>
							<li><a href="#">travel</a></li>
							<li><a href="#">white</a></li>
							<li><a href="#">t-shirt</a></li>
							<li><a href="#">teen</a></li>
						</ul>
					</aside>
					<!-- widget-tags end -->					
					<!-- widget-recent start -->
					<aside class="widget top-product-widget">
						<h3 class="sidebar-title">Top rated products</h3>
						<ul>
							<li>
								<div class="single-product">
									<div class="product-img">
										<a href="#">
											<img class="primary-image" src="img/product/15.jpg" alt="" />
											<img class="secondary-image" src="img/product/16.jpg" alt="" />
										</a>						
									</div>
									<div class="product-content">
										<div class="pro-info">
											<h2 class="product-name"><a href="#">Curabitur vulputate</a></h2>
											<div class="price-box">
												<span class="new-price">£90.00</span>
												<span class="old-price">£120.00</span>
											</div>								
										</div>									
									</div>
								</div>
							</li>
							<li>
								<div class="single-product">
									<div class="product-img">
										<a href="#">
											<img class="primary-image" src="img/product/women/8.jpg" alt="" />
											<img class="secondary-image" src="img/product/women/1.jpg" alt="" />
										</a>						
									</div>
									<div class="product-content">
										<div class="pro-info">
											<h2 class="product-name"><a href="#">Aliquam lobortis est</a></h2>
											<div class="price-box">
												<span class="new-price">£70.00</span>
												<span class="old-price">£100.00</span>
											</div>								
										</div>								
									</div>
								</div>	
							</li>
							<li>
								<div class="single-product">
									<div class="product-img">
										<a href="#">
											<img class="primary-image" src="img/product/6.jpg" alt="" />
											<img class="secondary-image" src="img/product/7.jpg" alt="" />
										</a>						
									</div>
									<div class="product-content">
										<div class="pro-info">
											<h2 class="product-name"><a href="#">Pellentesque posuere</a></h2>
											<div class="price-box">
												<span class="new-price">£50.00</span>
											</div>								
										</div>									
									</div>
								</div>
							</li>
						</ul>
					</aside>
					<!-- widget-recent end -->
				</div>
				<!-- blog-left-sidebar end -->
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
					<!-- toolbar start -->
					<div class="toolbar">
						<div class="view-mode">
							<a class="active" href="shop.html"><i class="fa fa-th-large"></i></a>
							<a class="list" href="shop-list.html"><i class="fa fa-th-list"></i></a>
						</div>
						<div class="show-result">
							<p> Showing 1–12 of 19 results</p>
						</div>
						<div class="toolbar-form">
							<form action="#">
								<div class="tolbar-select">
									<select>
									  <option value="volvo">Sort by popularity</option>
									  <option value="saab">Default sorting</option>
									  <option value="mercedes">Sort by average rating</option>
									  <option value="audi">Sort by newness</option>
									  <option value="audi">Sort by price: low to high</option>
									  <option value="audi">Sort by price: high to low</option>
									</select> 
								</div>
							</form>								
						</div>
					</div>	
					<!-- toolbar end -->
					<div class="clear"></div>
					<div class="row">
						<div class="grid-view">
						
						@foreach($produtos as $key => $produto)	
						{{--  verifica se o produto possui preço  --}}
						@if($produtos[$key]->veiculos->first()->pivot->preco)					
							<!-- single-product start -->
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="single-product">
									{{--  @if($produto->oferta)
										<span class="sale-text">Oferta</span>
									@endif  --}}
									<div class="product-img">
										<a href="{{ route('produto.show',$produto->id) }}">
											<img class="primary-image" src="{{asset($produto->imagemCapa)}}" alt="" />
											<img class="secondary-image" src="{{asset($produto->imagemCapa)}}" alt="" />
										</a>
										<div class="actions">
											<div class="action-buttons">
												<div class="add-to-cart">
													<a href="javascript:void(0);" onClick="Carrinho.add('{{ route('produto.addCarrinho',$produto->id) }}')"> Adicionar no Carrinho</a>
												</div>
												<div class="add-to-links">
													{{--  <div class="add-to-wishlist">
														<a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-star"></i>
														</a>
													</div>
													<div class="compare-button">
														<a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-exchange"></i></a>
													</div>									  --}}
												</div>
												<div class="quickviewbtn">
													<a href="{{route('produto.show',$produto->id)}}" data-toggle="tooltip" title="Ver"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
										</div>							
									</div>
									
									@foreach($produtos[$key]->veiculos as $veiculo)										
										<?php $precos[] = $veiculo->pivot->preco ?>
									@endforeach
									<div class="product-content">									
										<h2 class="product-name"><a href="#">{{ $produto->nome }}</a></h2>										

										<div class="price-box">
											<span class="new-price preco">{{min($precos)}}</span>
											<span class="new-price"> - </span>
											<span class="new-price preco">{{max($precos)}}</span>
										</div>
									</div>
								</div>
							</div>
							<!-- single-product end -->	
							@endif			
							@endforeach
						</div>
					</div>
					<!-- pagination start -->
					{{--  <div class="shop-pagination">
						<div class="pagination">
							<ul>
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
							</ul>
						</div>					
					</div>  --}}
					{{ $produtos->links('vendor.pagination.default') }}
					<!-- pagination end -->
				</div>
			</div>
		</div>
	</div>
	<!-- blog-area end -->
	<!-- brand-area start -->
	<div class="brand-area pad-60">
		<div class="container">
			<!-- section-heading start -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading">
						<h3>Our Brands</h3>
						<div class="title-icon">
							<span><i class="fa fa-angle-left"></i> <i class="fa fa-angle-right"></i></span>
						</div>						
					</div>
				</div>
			</div>
			<!-- section-heading end -->		
			<div class="row">
				<div class="brand-curosel">
					<!-- single-brand start -->
					<div class="col-md-2">
						<div class="single-brand">
							<a href="#"><img src="img/brand/1.png" alt="" /></a>
						</div>
					</div>
					<!-- single-brand end -->
					<!-- single-brand start -->
					<div class="col-md-2">
						<div class="single-brand">
							<a href="#"><img src="img/brand/1.png" alt="" /></a>
						</div>
					</div>
					<!-- single-brand end -->
					<!-- single-brand start -->
					<div class="col-md-2">
						<div class="single-brand">
							<a href="#"><img src="img/brand/1.png" alt="" /></a>
						</div>
					</div>
					<!-- single-brand end -->
					<!-- single-brand start -->
					<div class="col-md-2">
						<div class="single-brand">
							<a href="#"><img src="img/brand/1.png" alt="" /></a>
						</div>
					</div>
					<!-- single-brand end -->
					<!-- single-brand start -->
					<div class="col-md-2">
						<div class="single-brand">
							<a href="#"><img src="img/brand/1.png" alt="" /></a>
						</div>
					</div>
					<!-- single-brand end -->
					<!-- single-brand start -->
					<div class="col-md-2">
						<div class="single-brand">
							<a href="#"><img src="img/brand/1.png" alt="" /></a>
						</div>
					</div>
					<!-- single-brand end -->
					<!-- single-brand start -->
					<div class="col-md-2">
						<div class="single-brand">
							<a href="#"><img src="img/brand/1.png" alt="" /></a>
						</div>
					</div>
					<!-- single-brand end -->
					<!-- single-brand start -->
					<div class="col-md-2">
						<div class="single-brand">
							<a href="#"><img src="img/brand/1.png" alt="" /></a>
						</div>
					</div>
					<!-- single-brand end -->
				</div>
			</div>
		</div>
	</div>

@endsection