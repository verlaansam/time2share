<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\product_table;

class user_table_controller extends Controller
{
    public function admin(){
        $data = ['product' => product_table::all(),
                 'users' => User::all()];
        return view('admin', $data);
    }

    public function delete_user($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/admin');
    }
}
