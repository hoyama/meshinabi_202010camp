<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
    
    public function index(Request $request)
    {
        $name = $request->name;
        $category = $request->category;

        $query = Restaurant::query();
        if($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }
        if($category) {
            $query->whereHas('category', function($q) use ($category){
                $q->where('name', 'like', '%' . $category . '%');
            });
        }
        $restaurants = $query->simplepaginate(5);
        $restaurants->appends(compact('name', 'category'));
        // dd($category, $restaurants, $query);
        return view('restaurants.index', compact('restaurants'));
    }
        
        
        //$name = $request->name;
        //$restaurants = Restaurant::simplepaginate(10);
        // if(!empty($name)) {
        //     $$restaurants = Restaurant::where('name', 'like', '%' . $name . '%');
        // } else {
        //     $$restaurants = Restaurant::all();
        // }
        // return view('restaurants.index', compact('restaurants'));
    

    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        return view('restaurants.show', compact('restaurant'));
    }
}
