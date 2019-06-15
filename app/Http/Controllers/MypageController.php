<?php

namespace App\Http\Controllers;

use Auth;
use Plan;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index()
    {
        $user= Auth::user();
        $plans = $user->plans;

        return view('mypage',[
            'plans' => $plans,
        ]);
    }
}
