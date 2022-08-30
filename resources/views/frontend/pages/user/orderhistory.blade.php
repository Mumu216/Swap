@extends('frontend.layout.template')

@section('seo')
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <title>User Dashboard</title>
@endsection

@section('content')


        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">My Account<span>Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="dashboard">
                    <div class="container">
                        <div class="row">
                            <aside class="col-md-4 col-lg-3">
                                <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-downloads-link" data-toggle="tab" href="#tab-downloads" role="tab" aria-controls="tab-downloads" aria-selected="false">Downloads</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Sign Out</a>
                                    </li>
                                </ul>
                            </aside><!-- End .col-lg-3 -->

                                                    <!-- Order content -->

                                                        <div class="col-10">
                                                          <div class="tab-content" id="v-pills-tabContent">
                                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                            {{-- Table start --}}
                                                            <table class="table">
                                                                <thead class="thead-dark ">
                                                                    <tr>
                                                                      <th scope="col">SL.</th>
                                                                      <th scope="col">Order ID</th>
                                                                      <th scope="col">Order Date</th>
                                                                      <th scope="col">Items</th>
                                                                      <th scope="col">Total Amount</th>
                                                                      <th scope="col">Status</th>
                                                                      <th scope="col">Invoice</th>


                                                                    </tr>
                                                                  </thead>

                                                                  <tbody>
                                                                    @php $i = 1; @endphp
                                                                    @foreach($orders as $order)
                                                                    <tr>
                                                                        <th scope="row">{{ $i }}</th>
                                                                        <td>#id {{ $order->id }}</td>
                                                                        <td>{{ $order->updated_at }}</td>
                                                                        <td>
                                                                           <span class="badge badge-primary">Items</span>
                                                                        </td>
                                                                        <td>{{ $order->amount }}</td>
                                                                        <td>
                                                                            @if($order->status == 0)
                                                                            <span class="badge badge-primary">In Processing</span>
                                                                          @elseif($order->status == 1)
                                                                            <span class="badge badge-warning">Hold</span>
                                                                          @elseif($order->status == 2)
                                                                            <span class="badge badge-success">Completed</span>
                                                                          @elseif($order->status == 3)
                                                                            <span class="badge badge-danger">Canceled</span>
                                                                          @endif
                                                                        </td>
                                                                        <td>
                                                                            <a href="">Click to see Invoice</a>
                                                                        </td>
                                                                    </tr>
                                                                    @php $i++; @endphp
                                                                    @endforeach
                                                                  </tbody>
                                                                </table>
                                                            {{-- Table End --}}

                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div>

                                                {{-- Order History page content area start --}}

                                            </div><!-- End .col-lg-9 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .container -->
                                </div><!-- End .dashboard -->
                            </div><!-- End .page-content -->
                        </main><!-- End .main -->

@endsection
