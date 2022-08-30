<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Division;
use App\Models\District;
use App\Models\ProductImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class PagesController extends Controller
{
    /**
     * Display a listing of the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage()
    {
        return view('frontend.pages.homepage');
    }
    public function wishlist()
    {
        return view('frontend.pages.wishlist');
    }

    /**
     * Display a listing of the All Products.
     *
     * @return \Illuminate\Http\Response
     */
    public function allProducts()
    {

        $products = Product::orderBy('id', 'desc')->where('status', 1)->get();
        return view('frontend.pages.allProducts', compact('products'));
    }

    /**
     * Display a listing of the Product Details.
     *
     * @return \Illuminate\Http\Response
     */
    public function productDetails($slug)
    {
        $productDetails = Product::where('slug', $slug)->first();
        if (!is_null($productDetails)) {
            return view('frontend.pages.details', compact('productDetails'));
        } else {
            return redirect()->back();
        }
    }



    /**
     * Display a listing of the Sub Category listing product
     *
     * @return \Illuminate\Http\Response
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (!is_null($category)) {
            return view('frontend.pages.category', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display a listing of the primary Category listing product
     *
     * @return \Illuminate\Http\Response
     */
    public function pcategory($id)
    {
        $pcategory = Category::find($id);
        if (!is_null($pcategory)) {
            return view('frontend.pages.primarycategory', compact('pcategory'));
        } else {
            return redirect()->back();
        }
    }

    // Product Search Function
    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::orderby('id', 'desc')->where('title', "LIKE", '%' . $search . "%");

        if ($request->category != "ALL") {
            $products->where('cat_id', $request->category);
        };
        $products = $products->get();
        return view('frontend.pages.search', compact('search', 'products'));
    }


    /**
     * Display a listing of the cart page.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        return view('frontend.pages.cart');
    }


    /**
     * Display a listing of the checkout page.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $cartItems = Cart::orderBy('id', 'desc')->where('order_id', NULL)->get();
        $districts = District::orderBy('district_name', 'asc')->get();
        $divisions = Division::orderBy('priority', 'asc')->get();
        return view('frontend.pages.checkout', compact('cartItems', 'districts', 'divisions'));
    }

    /**
     * Display a listing of the login & Register page.
     *
     * @return \Illuminate\Http\Response
     */

    public function login()
    {
        return view('frontend.pages.login');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
