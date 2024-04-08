<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\product_table;


class product_table_controller extends Controller
{
    public function index(){
        return view('welcome', ['product' => product_table::where('status', 'available')->get()]);
    }

    public function dashboard(){
        $products = ['product' => product_table::where('userId', Auth::id())->where('status', 'available')->get(),
                    'product_request' => product_table::where('userId', Auth::id())->where('status', 'waiting_for_approval')->get(),
                    'product_rented_out' => product_table::where('userId', Auth::id())->where('status', 'rented')->get(),
                    'product_rented' => product_table::where('renterId', Auth::id())->where('status', 'rented')->get()];
        return view('dashboard', $products);
    }

    public function delete_product($id){
        $product = product_table::find($id);
        $product->delete();
        return redirect('/dashboard');
    }

    public function rent_product($id){
        $product = product_table::find($id);
        $product = product_table::where('id', $id)->update(['status' => 'waiting_for_approval']);
        $product = product_table::where('id', $id)->update(['renterId' => Auth::id()]);
        return redirect('/');
    }

    public function accept_product($id){
        $product = product_table::find($id);
        $product = product_table::where('id', $id)->update(['status' => 'rented']);
        return redirect('/dashboard');
    }

    public function decline_product($id){
        $product = product_table::find($id);
        $product = product_table::where('id', $id)->update(['status' => 'available']);
        return redirect('/dashboard');
    }


    public function product_table(Request $request){
        if($request->availableTill < $request->availableFrom){
            return redirect()->back();
        }
        $new_product = new product_table;
        $new_product->userId = Auth::id();
        $new_product->name = $request->name;
        $new_product->location = $request->location;
        $new_product->catagorie = $request->catagorie;
        $new_product->image = $request->image;
        $new_product->availableFrom = $request->availableFrom;
        $new_product->availableTill = $request->availableTill;
        $new_product->status = 'available';
        $new_product->renterId = 0;
        $new_product->save();
        return redirect('/dashboard');
    }
}
