@extends('frontend.layout.template')
@section('seo')
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <title>All Products</title>
@endsection

@section('content')


<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Grid 3 Columns<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Grid 3 Columns</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                			<div class="toolbox">
                				<div class="toolbox-left">
                					<div class="toolbox-info">
                						Showing <span>9 of 56</span> Products
                					</div><!-- End .toolbox-info -->
                				</div><!-- End .toolbox-left -->

                				<div class="toolbox-right">
                					<div class="toolbox-sort">
                						<label for="sortby">Sort by:</label>
                						<div class="select-custom">
											<select name="sortby" id="sortby" class="form-control">
												<option value="popularity" selected="selected">Most Popular</option>
												<option value="rating">Most Rated</option>
												<option value="date">Date</option>
											</select>
										</div>
                					</div><!-- End .toolbox-sort -->
                					<div class="toolbox-layout">
                						<a href="category-list.html" class="btn-layout">
                							<svg width="16" height="10">
                								<rect x="0" y="0" width="4" height="4" />
                								<rect x="6" y="0" width="10" height="4" />
                								<rect x="0" y="6" width="4" height="4" />
                								<rect x="6" y="6" width="10" height="4" />
                							</svg>
                						</a>

                						<a href="category-2cols.html" class="btn-layout">
                							<svg width="10" height="10">
                								<rect x="0" y="0" width="4" height="4" />
                								<rect x="6" y="0" width="4" height="4" />
                								<rect x="0" y="6" width="4" height="4" />
                								<rect x="6" y="6" width="4" height="4" />
                							</svg>
                						</a>

                						<a href="category.html" class="btn-layout active">
                							<svg width="16" height="10">
                								<rect x="0" y="0" width="4" height="4" />
                								<rect x="6" y="0" width="4" height="4" />
                								<rect x="12" y="0" width="4" height="4" />
                								<rect x="0" y="6" width="4" height="4" />
                								<rect x="6" y="6" width="4" height="4" />
                								<rect x="12" y="6" width="4" height="4" />
                							</svg>
                						</a>

                						<a href="category-4cols.html" class="btn-layout">
                							<svg width="22" height="10">
                								<rect x="0" y="0" width="4" height="4" />
                								<rect x="6" y="0" width="4" height="4" />
                								<rect x="12" y="0" width="4" height="4" />
                								<rect x="18" y="0" width="4" height="4" />
                								<rect x="0" y="6" width="4" height="4" />
                								<rect x="6" y="6" width="4" height="4" />
                								<rect x="12" y="6" width="4" height="4" />
                								<rect x="18" y="6" width="4" height="4" />
                							</svg>
                						</a>
                					</div><!-- End .toolbox-layout -->
                				</div><!-- End .toolbox-right -->
                			</div><!-- End .toolbox -->

                            <div class="products mb-3">
                                <div class="row justify-content-center">

                                    @foreach($products as $product)

                                    <div class="col-sm-6 col-lg-4 product">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                @if($product->is_featured == 0)

                                                @elseif($product->is_featured == 1)
                                                   <span class="product-label label-new">Sale</span>
                                             @endif
                                              <!-- product image -->

                                                <a href="{{ route('productDetails', $product->slug ) }}">
                                                    <span class="product-thumb-info-image">
                                                        @php $p = 1; @endphp
                                                        @foreach($product->images as $image)
                                                            @if($p > 0 )
                                                            <img src="{{ asset('backend/img/products/'   .  $image->image) }}" class="product-image" alt="{{ $product->title  }}">
                                                            @endif
                                                            @php $p--; @endphp
                                                        @endforeach
                                                </span>
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <!-- add to cart-->
                                                <div class="product-action">
                                                    <span>
                                                    <form action="{{ route('cart.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="quantity" value="1">
                                                        @if($product->is_featured == 0)
                                                         <input type="hidden" name="unit_price" value="{{ $product->regular_price }}">
                                                        @elseif($product->is_featured == 1)
                                                          <input type="hidden" name="unit_price" value="{{ $product->offer_price }}">
                                                        @endif
                                                        <button type="submit" style="border:none;background:transparent;">Add to Cart</button>
                                                    </form>
                                                </span>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                {{-- <div class="product-cat">
                                                    <a href="#">Women</a>
                                                </div><!-- End .product-cat --> --}}
                                                <h3 class="product-title"><a href="">{{ $product->title }}</a></h3><!-- End .product-title -->

                                                <!-- product price-->
                                                <span class="product-price">
                                                    @if($product->is_featured==0)
                                                    <ins><span class="amount text-dark font-weight-semibold">৳{{$product->regular_price}}</span></ins>
                                                  @elseif($product->is_featured==1)
                                                    <del><span class="amount">৳{{ $product->regular_price }}</span></del>
                                                    <ins><span class="amount text-dark font-weight-semibold">৳{{ $product->offer_price }}</span></ins>
                                                  @endif
                                                </span><!-- End .product-price -->

                                                {{-- <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 Reviews )</span>
                                                </div><!-- End .rating-container --> --}}

                                            <div class="product-nav product-nav-thumbs">
                                                <a href="#" class="active">
                                                    @php $p = 1; @endphp
                                                    @foreach($product->images as $image)
                                                        @if($p > 0 )
                                                        <img src="{{ asset('backend/img/products/'   .  $image->image) }}" class="product-image" alt="{{ $product->title  }}">
                                                        @endif
                                                        @php $p++; @endphp
                                                    @endforeach
                                                </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->
                                    @endforeach


                                </div><!-- End .row -->
                            </div><!-- End .products -->

                			<nav aria-label="Page navigation">
							    <ul class="pagination justify-content-center">
							        <li class="page-item disabled">
							            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
							                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
							            </a>
							        </li>
							        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
							        <li class="page-item"><a class="page-link" href="#">2</a></li>
							        <li class="page-item"><a class="page-link" href="#">3</a></li>
							        <li class="page-item-total">of 6</li>
							        <li class="page-item">
							            <a class="page-link page-link-next" href="#" aria-label="Next">
							                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
							            </a>
							        </li>
							    </ul>
							</nav>
                		</div><!-- End .col-lg-9 -->
                     @include('frontend.includes.leftsidebar')

                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection
