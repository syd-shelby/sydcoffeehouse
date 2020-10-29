<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;

class OrderController extends Controller
{
    public function index (){
      $items = Menu::all();
      return view('order', ['items' => $items]);
    }

    public function index_o(){
      $orders =  Order::all();
      return view('employee', ['orders' => $orders]);
    }

    //build order record and store in Orders db
    public function store (){
      $or = new Order();

      $or->name = request('name');
      $or->email = request('email');
      $items = Menu::all();

      //build object array of order based on incoming selection (array of ints)
      $arr = [];
      foreach ($items as $k=>$i){
        $qty = request('selection')[$k];
        if ($qty > 0){
          $or_obj = new \stdClass();
          $or_obj->item = $i->item; //get item name from db
          $or_obj->quantity = request('selection')[$k]; //get quantity from post
          array_push($arr, $or_obj);
        }
      }
       $or->order = $arr;
       $or->save();
       return redirect('/order')->with('mes', 'Thanks for your order!');
    }
}
