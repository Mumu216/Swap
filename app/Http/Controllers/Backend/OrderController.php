<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\District;
use App\Models\Division;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders = Order::orderBy('id' , 'desc')->get();
      return view('backend.pages.orders.manage' , compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $orderDetails = Order::find($id);
       if(!is_null( $orderDetails)){
        return view('backend.pages.orders.details' , compact('orderDetails'));
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderDetails = Order::find($id);
        $divisions = Division::orderBy('priority' , 'asc')->get();
        $districts = District::orderBy('district_name','asc')->get();
        if(!is_null($orderDetails))
        {
            return view('backend.pages.orders.update' , compact('orderDetails', 'divisions' , 'districts'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orderDetailsUpdate = Order::find($id);

        $orderDetailsUpdate->cus_name         = $request->first_name;
        $orderDetailsUpdate->last_name        = $request->last_name;
        $orderDetailsUpdate->phone            = $request->phone;
        $orderDetailsUpdate->address          = $request->address;
        $orderDetailsUpdate->division_id      = $request->division_id;
        $orderDetailsUpdate->district_id      = $request->district_id;
       //  $orderDetailsUpdate->post_code        = $request->post_code;
        $orderDetailsUpdate->status           = $request->status;
        $orderDetailsUpdate->admin_note       = $request->admin_note;


        $orderDetailsUpdate->save();

        return redirect()->route('order.details' , $orderDetailsUpdate->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
