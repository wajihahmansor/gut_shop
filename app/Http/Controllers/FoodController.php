<?php

namespace App\Http\Controllers;
use App\Food;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;

class FoodController extends Controller
{
    
    public function index(){
        //fetch all posts data
        $food = Food::orderBy('food_id', 'food_name', 'food_img', 'food_description', 'food_highlight', 'food_ingredient', 'food_delivery', 'food_price', 'cat_id')->get();
        
        //pass posts data to view and load list view
        //$food = Admin::all();
        return view('food.index', ['food' => $food]);
    }
    
    public function details($food_id){
        //fetch post data
        $food = Food::find($food_id);
        
        //pass posts data to view and load list view
        return view('food.details', ['food' => $food]);
    }
    
    public function add(){
        //load form view
        return view('food.add');
    }
    
    public function insert(Request $request){
        //validate post data
        $this->validate($request, [
            'food_name' => 'required',
            'food_ingredient' => 'required',
            'food_description' => 'required',
            'food_highlight' => 'required',
            'food_delivery' => 'required',
            'cat_id' => 'required',
            //'food_img' => 'required',
            'food_price' => 'required'
        ]);
        
        //get post data
        $postData = $request->all();
        
        //insert post data
        Food::create($postData);
        
        //store status message
        Session::flash('success_msg', 'Post added successfully!');

        return redirect()->route('food.index');
    }
    
    public function edit($food_id){
        //get post data by id
        $food = Food::find($food_id);
        
        //load form view
        return view('food.edit', ['food' => $food]);
    }
    
    public function update($food_id, Request $request){
        //validate post data
        $this->validate($request, [
            'food_name' => 'required',
            'food_ingredient' => 'required',
            'food_description' => 'required',
            'food_highlight' => 'required',
            'food_delivery' => 'required',
            'cat_id' => 'required',
            //'food_img' => 'required',
            'food_price' => 'required'
        ]);
        
        //get post data
        $postData = $request->all();
        
        //update post data
        Food::find($food_id)->update($postData);
        
        //store status message
        Session::flash('success_msg', 'Post updated successfully!');

        return redirect()->route('food.index');
    }
    
    public function delete($food_id){
        //update post data
        Food::find($food_id)->delete();
        
        //store status message
        Session::flash('success_msg', 'Post deleted successfully!');

        return redirect()->route('food.index');
    }
    
}