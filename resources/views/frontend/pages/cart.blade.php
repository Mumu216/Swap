@extends('frontend.layout.template')

@section('seo')
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <title>Molla - Bootstrap eCommerce Template</title>
@endsection

@section('content')

		<main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="cart">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <table class="table table-cart table-mobile">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($cartItems->count() <= 0)
                                         <div class="alert alert-info">
                                            Sorry!!! No item added in your cart. Please add your item first.
                                         </div>
                                         @endif
                                         @php $total_price = 0; @endphp
                                         @foreach($cartItems as $item)
                                         <tr>
                                            <td class="remove-col">
                                                    <form action="{{ route('cart.destroy' , $item->id) }}" method="POST">
                                                        @csrf
                                                    <button class="btn-remove"><i class="icon-close"></i>
                                                    </button>
                                                </td>
                                            </form>
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="{{ route('productDetails' , $item->product->slug) }}">
                                                            @if($item->product->images->count() > 0 )
                                                            <img src="{{ asset('backend/img/products/' . $item->product->images->first()->image ) }}" alt="{{ $item->title }}" class="img-fluid">
                                                            @endif
                                                        </a>
                                                    </figure>

                                                    <h3 class="product-title">
                                                        <a href="{{ route('productDetails' , $item->product->slug) }}">{{ $item->product->title }}</a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col">
                                                @if(!is_null($item->product->offer_price))
                                                ৳{{ $item->product->offer_price }} BDT
                                                 @else
                                                 ৳{{ $item->product->regular_price }} BDT
                                               @endif
                                            </td>
                                            <form action="{{ route('cart.update' , $item->id) }}" method="POST">
                                                @csrf
                                            <td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" name="quantity" value="{{ $item->quantity }}" min="1" max="10" step="1" data-decimals="0" required>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>

                                            <td class="total-col">
                                                @if(!is_null($item->product->offer_price))
                                                {{ $total_price = $item->quantity  * $item->product->offer_price }}
                                                @else
                                                {{ $total_price = $item->quantity * $item->product->regular_price }}
                                            @endif
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="submit" value="Update" name="update_cart" class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase cart-update-btn">
                                                    {{-- <a href="#"  class="btn btn-outline-dark-2 cart-update-btn"><span>UPDATE CART</span><i class="icon-refresh"></i></a> --}}
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                                    </tbody>
                                </table><!-- End .table table-wishlist -->

                                <div class="cart-bottom">
                                    <div class="cart-discount">
                                        <form action="#">
                                            <div class="input-group">
                                                <input type="text" class="form-control" required placeholder="coupon code">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                                </div><!-- .End .input-group-append -->
                                            </div><!-- End .input-group -->
                                        </form>
                                    </div><!-- End .cart-discount -->


                                </div><!-- End .cart-bottom -->
                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary summary-cart">
                                    <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <tbody>
                                            <tr class="summary-subtotal">
                                                <td>Subtotal:</td>
                                                <td>{{ App\Models\Cart::totalPrice() }}</td>
                                            </tr><!-- End .summary-subtotal -->
                                            <tr class="summary-shipping">
                                                <td>Shipping:</td>
                                                <td>&nbsp;</td>
                                            </tr>

                                            <tr class="summary-shipping-row">
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                        <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                                                    </div><!-- End .custom-control -->
                                                </td>
                                                <td>$0.00</td>
                                            </tr><!-- End .summary-shipping-row -->

                                            <tr class="summary-shipping-row">
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                                                        <label class="custom-control-label" for="standart-shipping">Standart:</label>
                                                    </div><!-- End .custom-control -->
                                                </td>
                                                <td>$10.00</td>
                                            </tr><!-- End .summary-shipping-row -->

                                            <tr class="summary-shipping-row">
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                                                        <label class="custom-control-label" for="express-shipping">Express:</label>
                                                    </div><!-- End .custom-control -->
                                                </td>
                                                <td>$20.00</td>
                                            </tr><!-- End .summary-shipping-row -->

                                            <tr class="summary-shipping-estimate">
                                                <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
                                                <td>&nbsp;</td>
                                            </tr><!-- End .summary-shipping-estimate -->

                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>{{ App\Models\Cart::totalPrice() }}</td>
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <a href="{{ route('checkout') }}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                                </div><!-- End .summary -->

                                <a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->




@endsection

