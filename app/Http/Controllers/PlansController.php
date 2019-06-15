<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Plan;

class PlansController extends Controller
{
    public function index()
    {
        $plans = Plan::select('title', 'image')->get();

        return view('plans.index', [
            'plans' => $plans,
        ]);
    }

    public function store(Request $request) //post
    {
        $plan = new Plan();

        // $plan->title = $request->title;
        // $plan->season = $request->season;
        // $plan->address = $request->address;
        // $plan->price = $request->price;
        // $plan->access = $request->access;
        // $plan->content = $request->content;
        $plan->fill($request->all());

        $originalImg = $request->p_image;
        $filePath = $originalImg->store('public');
        $plan->image = str_replace('public/', '', $filePath);

        $user = Auth::user();
        $plan->user_id = $user->id;

        $plan->save();
        
        return redirect()->route('mypage');
    }

    public function create() //get
    {
        return view('plans/create', [
            'plan' => new Plan(),
        ]);


        // return view('plans/create',[
        //     'title' => $plan->title,
        //     'season' => $plan->season,
        //     'price' => $plan->price,
        //     'access' => $plan->access,
        //     'content' => $plan->content,
        //     'image' => str_replace('public/', 'storage/', $plan->p_image),
        // ]);
    }

    public function edit(Request $request, int $plan) //get
    {
        $plan = Plan::find($plan);

        $plan->fill($request->all());

        $originalImg = $request->p_image;
        if($originalImg !== null) {
            $filePath = $originalImg->store('public');
            $plan->image = str_replace('public/', '', $filePath);
        }

        $plan->save();

        return view('plans.edit', [
            'plan' => $plan,
        ]);
    }

    public function update(Request $request, int $plan)
    {
        $plan = Plan::find($plan);

        $plan->fill($request->all());

        $originalImg = $request->p_image;
        if($originalImg !== null) {
            $filePath = $originalImg->store('public');
            $plan->image = str_replace('public/', '', $filePath);
        }

        $plan->save();

        return redirect()->route('mypage');
    }

    public function show(Request $request, int $plan)
    {
        $plan = Plan::find($plan);

        return view('plans.show', [
           'plan' => $plan,
        ]);
    }

    public function destroy(Request $request, int $plan)
    {
        //
    }
}
