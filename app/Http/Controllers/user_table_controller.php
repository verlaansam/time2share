<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;

class user_table_controller extends Controller
{
    public function admin(){
        return view('admin', ['users' => User::all()]);
    }

    public function delete_user($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/admin');
    }
}
