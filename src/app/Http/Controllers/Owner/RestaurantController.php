<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Owner;
use App\Models\RestaurantInfo;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');
    }

    public function index()
    {
        $owner_id = Auth::id();
        $restaurant = RestaurantInfo::where('owner_id', $owner_id)->firstOrFail();
        return view('owner.restaurant.index', compact('restaurant'));
    }

    public function edit()
    {
        $owner_id = Auth::id();
        $restaurant = RestaurantInfo::where('owner_id', $owner_id)->firstOrFail();
        return view('owner.restaurant.edit', compact('restaurant'));
    }

    public function update(Request $request)
    {
        $owner_id = Auth::id();
        $restaurant = RestaurantInfo::where('owner_id', $owner_id)->firstOrFail();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'img' => ['mimes:jpg,jpeg,png', 'max:2048'],
            'information' => ['required', 'string', 'max:2000'],
            'time' => ['required', 'string', 'max:2000'],
            'budget' => ['required', 'string', 'max:2000'],
            'zip' => ['required', 'regex:/^\d{3}[-]\d{4}$/'],
            'is_selling' => 'required',
        ]);
        // 画像のアップロードと名前の取得
        if($request->file('img')) {
          $now = Carbon::now()->format('YmdHis-');
          $file_name = $now.$request->file('img')->getClientOriginalName();
          $request->file('img')->storeAs('public/restaurant', $file_name);
          $restaurant->img = $file_name;
        }
        $restaurant->name = $request->name;
        $restaurant->information = $request->information;
        $restaurant->time = $request->time;
        $restaurant->budget = $request->budget;
        $restaurant->zip = $request->zip;
        $restaurant->pref = $request->pref;
        $restaurant->city = $request->city;
        $restaurant->address = $request->address;
        $restaurant->is_selling = $request->is_selling;
        $restaurant->save();
        return redirect()->route('owner.restaurant.index')
                        ->with(['status' => 'レストラン情報更新が完了しました。']);
    }
}
