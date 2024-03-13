<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\RestaurantInfo;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurant = RestaurantInfo::where('is_selling', '=', '1')->paginate(12);
        return view('user.restaurant.index', compact('restaurant'));
    }
}
