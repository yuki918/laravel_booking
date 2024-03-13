<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\RestaurantInfo;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }

    public function index()
    {
        $owners = Owner::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.owner.index', compact('owners'));
    }

    public function create()
    {
        return view('admin.owner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:owners'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);
        try {
            DB::beginTransaction();
            $owner = Owner::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            RestaurantInfo::create([
                'owner_id' => $owner->id,
                'name' => 'レストラン名をご記入ください。',
                'img' => 'restaurant_thumbnail.png',
                'information' => 'レストランの詳細をご記入ください。',
                'time' => 'レストランの営業時間をご記入ください。',
                'budget' => 'レストランの予算をご記入ください。',
                'zip' => '0000-000',
                'pref' => '東京',
                'city' => '港区',
                'address' => 'レストラン001',
                'tel' => '0000-0000-0000',
                'is_selling' => 0,
            ]);
            DB::commit();
        } catch (\Throwable $e) {
            \Log::error($e);
            throw $e;
        }
        return redirect()->route('admin.owner.index')
                        ->with(['status' => 'オーナー登録が完了しました。']);
    }

    public function show(string $id)
    {
        // 
    }

    public function edit(string $id)
    {
        $owner = Owner::findOrFail($id);
        return view('admin.owner.edit', compact('owner'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'  => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['confirmed', Password::defaults()],
        ]);
        $owner = Owner::findOrFail($id);
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->password = Hash::make($request->password);
        $owner->save();
        return redirect()->route('admin.owner.index')
                        ->with(['status' => 'オーナー情報更新が完了しました。']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Owner::findOrFail($id)->delete();
        return redirect()->route('admin.owner.index')
                        ->with(['status' => 'オーナーが削除されました。']);
    }
}
