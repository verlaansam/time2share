<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\review_table;

class review_table_controller extends Controller
{
    public function review_table(Request $request){
        $new_review = new review_tables;
        $new_review->userId = $request->userId;
        $new_review->review = $request->review;
        $new_review->save();
        return redirect('/dashboard');
    }
}
