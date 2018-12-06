<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;
use App\Http\Resources\Cart as CartResource;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $carts = Cart::paginate(15);
        // Return collection of articles as a resource
        return CartResource::collection($carts);
    }




    public function store(Request $request)
    {
        $cart = $request->isMethod('put') ? Cart::findOrFail($request->cart_id) : new Cart;
        $cart->id = $request->input('cart_id');
        $cart->name = $request->input('name');
        $cart->email = $request->input('email');
        $cart->address = $request->input('address');
        $cart->quantity = $request->input('quantity');
        if($cart->save()) {
            return new CartResource($cart);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get article
        $cart = Cart::findOrFail($id);
        // Return single article as a resource
        return new CartResource($cart);
    }



    public function destroy($id)
    {
        // Get article
        $cart = Cart::findOrFail($id);
        if ($cart->delete()) {
            return new CartResource($cart);
        }
    }


    public function update(Request $request, $id)
    {
        // Validate the data
        $this->validate($request, array(
            'name' => 'required|max:255',
            'address'  => 'required',
            'email' => 'required',
            'quantity'  => 'required'
        ));
        // Save the data to the database
        $cart = Cart::find($id);

        $cart->name = $request->input('name');
        $cart->address = $request->input('address');
        $cart->email = $request->input('email');
        $cart->quantity = $request->input('quantity');

        if ($cart->save()) {
            return new CartResource($cart);
        }


    }
}
