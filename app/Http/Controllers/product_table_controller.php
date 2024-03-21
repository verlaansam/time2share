<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\product_table;


class product_table_controller extends Controller
{
    public function index(){
        return view('welcome', ['products' => product_table::all()]);
    }

    public function product_table(Request $request){
        $new_product = new product_table;
        $new_product->userId = Auth::id();
        $new_product->name = $request->name;
        $new_product->location = $request->location;
        $new_product->catagorie = $request->catagorie;
        $new_product->image = $request->image;
        $new_product->availableFrom = $request->availableFrom;
        $new_product->availableTill = $request->availableTill;
        $new_product->save();
        return view('welcome');
    }
}
