@extends('backend.layout.template');

@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Customer Order Details</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>


  <div class="br-pagebody">
    <div class="br-section-wrapper">
        <div class="row">
            <div class="col-lg-4">
                <div class="order-summery-box">
                    <h3 class="br-section-label">Customer Information</h3>
                    <p><span>Full Name: </span>{{ $orderDetails->cus_name }} {{ $orderDetails->last_name }}</p>
                    <p><span>Email Address: </span>{{ $orderDetails->email }}</p>
                    <p><span>Phone No: </span>{{ $orderDetails->phone }}</p>
                </div>
            </div>

              <div class="col-lg-4">
                <div class="order-summery-box">
                    <h3 class="br-section-label">Transaction Details</h3>
                    <p><span>Amount Total:</span> {{ $orderDetails->amount}} {{ $orderDetails->currency }}</p>
                    <p><span>Transaction ID:</span> {{ $orderDetails->transaction_id}}</p>
                    <p><span>Status:</span>
                        @if($orderDetails->status == 0)
                          <span class="badge badge-info">In Processing</span>
                        @elseif($orderDetails->status == 1)
                          <span class="badge badge-success">On Hold</span>
                        @elseif($orderDetails->status == 2)
                          <span class="badge badge-warning">Successfully Delivered </span>
                        @elseif($orderDetails->status == 3)
                         <span class="badge badge-danger">Canceled</span>
                        @endif
                      </p>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="order-summery-box">
                    <h3 class="br-section-label">Shipping Address</h3>
                    <p><span>Shipping Address: </span>{{$orderDetails->address}}</p>
                    <p><span>District: </span>{{$orderDetails->district->district_name}}</p>
                    <p><span>Division: </span>{{$orderDetails->division->name}}</p>
                    <p><span>Country: </span>{{$orderDetails->country}}</p>
                    <p><span>Zip Code: </span>{{$orderDetails->post_code}}</p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
