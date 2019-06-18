<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Plan;
use App\Season;
use App\Address;

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
        $seasons = Season::select('id', 'season')->get();
        $seasonId = $seasons->pluck('season', 'id');

        $addresses = Address::select('id', 'address')->get();
        $addressId = $addresses->pluck('address', 'id');

        return view('plans.create',[
            'plan' => new Plan(),
            'seasonId' => $seasonId,
            'addressId' => $addressId,
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

        $seasons = Season::select('id', 'season')->get();
        $season_id_loop = $seasons->pluck('id', 'season');

        $addresses = Address::select('id', 'address')->get();
        $address_id_loop = $addresses->pluck('address', 'id');


        return view('plans.edit',[
            'season_id_loop' => $season_id_loop,
            'address_id_loop' => $address_id_loop,
            'plan' => $plan
            ]);
    }

    public function update(Request $request, int $plan)
    {
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

        //$seasonId = $plan->season_id;
        // $season = Season::where('id',$seasonId)->get('season')->first();
        $season = Season::find($plan->season_id);

        //$addressId = $plan->address_id;
        //$address = Address::where('id',$addressId)->get('address')->first();
        $address = Address::find($plan->address_id);

        return view('plans.show', [
            'plan' => $plan,
            'season' => $season,
            'address' => $address,
        ]);
    }

    public function destroy(Request $request, int $plan)
    {
        //
    }
}
