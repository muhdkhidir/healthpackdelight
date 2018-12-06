<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Food;
use App\Http\Resources\Food as FoodResource;

class FoodController extends Controller
{

    public function index()
    {

        $foods = Food::paginate(15);

        return FoodResource::collection($foods);
    }

    public function store(Request $request)
    {
        $food = $request->isMethod('put') ? Food::findOrFail($request->food_id) : new Food;
        $food->id = $request->input('food_id');
        $food->description = $request->input('description');
        $food->price = $request->input('price');
        $food->description = $request->input('description');
        if ($food->save()) {
            return new FoodResource($food);
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
        $food = Food::findOrFail($id);
        // Return single article as a resource
        return new FoodResource($food);
    }





}
