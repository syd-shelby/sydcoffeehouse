<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index (){
      $items = Menu::all();
      return view('menu', ['items' => $items]);
    }

    public function show($id){
      $items = Menu::all();

      foreach ($items as $item){
        $name = strtolower(str_replace(' ','', $item->item));
        if ($name == $id){
          return view('menuItem', ['item' => $item]);
        }
      }
      return view('menu', ['items' => $items]);
    }
}
