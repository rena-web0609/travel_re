<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Season;
use App\Address;
use Auth;

class PlansController extends Controller
{
    public function index(Request $request)
    {
        $seasons = Season::select('id', 'season')->get();
        $seasonId = $seasons->pluck('season', 'id');

        $addresses = Address::select('id', 'address')->get();
        $addressId = $addresses->pluck('address', 'id');

        if(!empty($request->season_id && $request->address_id)) {
            $plans = Plan::where([
                'season_id' => $request->season_id,
                'address_id' => $request->address_id,
            ])->get();
        }elseif(!empty($request->season_id)) {
            $plans = Plan::where(['season_id' => $request->season_id])->get();
        }elseif(!empty($request->address_id)){
            $plans = Plan::where(['address_id' => $request->address_id])->get();
        }else{
            $plans = Plan::all();
        }

        return view('plans.index', [
            'plans' => $plans,
            'seasonId' => $seasonId,
            'addressId' => $addressId,
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


        $filename = $request->image->store('public/pic');
        $plan-> image = basename($filename);

        $user = Auth::user();
        $plan->user_id = $user->id;

        $plan->save();
        
        return redirect()->route('mypage');
    }

    public function create() //get
    {
        $plan =new Plan();
        $seasons = Season::select('id', 'season')->get();
        $seasonId = $seasons->pluck('season', 'id');

        $addresses = Address::select('id', 'address')->get();
        $addressId = $addresses->pluck('address', 'id');

        return view('plans.create',[
            'plan' => $plan,
            'seasonId' => $seasonId,
            'addressId' => $addressId,
        ]);


        // return view('plans/create',[
        //     'title' => $plan->title,
        //     'season' => $plan->season,
        //     'price' => $plan->price,
        //     'access' => $plan->access,
        //     'content' => $plan->content,
        //     'image' => str_replace('public/', 'storage/', $plan->image),
        // ]);
    }

    public function edit(int $plan) //get
    {
        $plan = Plan::find($plan);

        $seasons = Season::select('id', 'season')->get();
        $seasonId = $seasons->pluck('season', 'id');

        $addresses = Address::select('id', 'address')->get();
        $addressId = $addresses->pluck('address', 'id');


        return view('plans.edit',[
            'seasonId' => $seasonId,
            'addressId' => $addressId,
            'plan' => $plan
            ]);
    }

    public function update(Request $request, int $plan)
    {
        $plan = Plan::find($plan);
        $plan->fill($request->all());

        $filename = $request->image;
        if($filename !== null) {
            $filename = $request->image->store('public/pic');
            $plan-> image = basename($filename);
        }

        $plan->save();

        return redirect()->route('mypage');
    }

    public function show(int $plan)
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
        Plan::find($plan)->delete();

        return redirect()->route('mypage');
    }

}
