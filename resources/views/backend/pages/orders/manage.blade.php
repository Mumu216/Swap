@extends('backend.layout.template');

@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Manage Order</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>


  <div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Basic Table</h6>
          <div class="bd bd-gray-300 rounded ">
            <div class="row">
               <div class="col-lg-12">

                <table class="table table-bordered table-striped mg-b-0">
                    <thead class="thead-colored thead-dark">
                      <tr>
                        <th scope="col">#Sl</th>
                        <th scope="col">Date & Time</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Order Details</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                         @foreach($orders as $order)
                      <tr>
                        <th scope="row">{{ $i }}</th>
                        <td></td>
                        <td>{{ $order->cus_name }}   {{ $order->last_name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>
                            <a href="{{ route('order.details' , $order->id) }}" class="btn btn-info btn-sm">See Details</a>
                        </td>
                        <td>
                            <div class="action-button">
                                <ul>
                                    <li><a href="{{ route('order.edit' , $order->id) }}"><i class="fa fa-edit"></i></a></li>
                                    <li><a href="" data-toggle="modal" data-target="#delete{{ $order->id }}"><i class="fa fa-trash"></i></a></li>
                                 </ul>


                                 <!-- Modal start -->


                                 {{-- <div class="modal fade" id="delete{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete this Order?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body text-center" >
                                        <div class="modal-buttons">
                                          <ul>
                                            <li>
                                              <form action="{{ route('order.destroy' , $order->id) }}" method="POST">
                                                @csrf
                                                <input type="submit" name="delete" class="btn btn-success" value="Confirm">
                                              </form>
                                            </li>
                                            <li><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div> --}}
                                 <!-- Modal End -->


                            </div>
                        </td>
                    </tr>
                       @php $i++ ; @endphp
                       @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>

@endsection
