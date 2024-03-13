<x-owner-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            オーナー編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  @if (session('status'))
                      <div class="mb-4 font-medium text-sm text-green-600">
                          {{ session('status') }}
                      </div>
                  @endif
                  <div class="text-right mb-4">
                    <a href="{{ route('owner.restaurant.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">戻る</a>
                  </div>
                  <div class="w-full mx-auto overflow-auto">
                    <form method="POST" action="{{ route('owner.restaurant.update') }}" enctype="multipart/form-data">
                      @method('PUT')
                      @csrf
                      <div class="bg-white flex flex-col md:ml-auto w-full">
                        <div class="relative mb-4">
                          <label for="name" class="leading-7 text-sm text-gray-600">レストラン名</label>
                          <input type="text" id="name" name="name" value="{{ $restaurant->name }}" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="relative mb-4">
                          <label for="img" class="leading-7 text-sm text-gray-600">サムネイル</label>
                          <div class="w-80 mb-4"><img src="{{ asset('storage/restaurant/' . $restaurant->img) }}"></div>
                          <input type="file" id="img" name="img" value="{{ $restaurant->img }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <x-input-error class="mt-2" :messages="$errors->get('img')" />
                        </div>
                        <div class="relative mb-4">
                          <label for="information" class="leading-7 text-sm text-gray-600">説明</label>
                          <textarea id="information" name="information" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $restaurant->information }}</textarea>
                          <x-input-error class="mt-2" :messages="$errors->get('information')" />
                        </div>
                        <div class="relative mb-4">
                          <label for="time" class="leading-7 text-sm text-gray-600">営業時間</label>
                          <textarea id="time" name="time" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $restaurant->time }}</textarea>
                          <x-input-error class="mt-2" :messages="$errors->get('time')" />
                        </div>
                        <div class="relative mb-4">
                          <label for="budget" class="leading-7 text-sm text-gray-600">予算</label>
                          <input type="text" id="budget" name="budget" value="{{ $restaurant->budget }}" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <x-input-error class="mt-2" :messages="$errors->get('budget')" />
                        </div>
                        <div class="relative mb-4">
                          <label for="zip" class="leading-7 text-sm text-gray-600">郵便番号</label>
                          <input type="text" id="zip" name="zip" value="{{ $restaurant->zip }}" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <x-input-error class="mt-2" :messages="$errors->get('zip')" />
                        </div>
                        <div class="relative mb-4">
                          <label for="pref" class="leading-7 text-sm text-gray-600">都道府県</label>
                          <select name="pref" id="pref" name="pref" value="{{ $restaurant->pref }}" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="" selected>都道府県</option>
                            @foreach(config('pref') as $pref_id => $name)
                              <option value="{{ $pref_id }}" {{ $restaurant->pref == $pref_id ? "selected" : ""}}>{{ $name }}</option>
                            @endforeach
                          </select>                          
                          <x-input-error class="mt-2" :messages="$errors->get('pref')" />
                        </div>
                        <div class="relative mb-4">
                          <label for="city" class="leading-7 text-sm text-gray-600">市区町村</label>
                          <input type="text" id="city" name="city" value="{{ $restaurant->city }}" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <x-input-error class="mt-2" :messages="$errors->get('city')" />
                        </div>
                        <div class="relative mb-4">
                          <label for="address" class="leading-7 text-sm text-gray-600">それ以降の住所</label>
                          <input type="text" id="address" name="address" value="{{ $restaurant->address }}" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <x-input-error class="mt-2" :messages="$errors->get('address')" />
                        </div>
                        <div class="relative mb-4">
                          <label for="address" class="leading-7 text-sm text-gray-600">表示する</label>
                          <div class="flex gap-4">
                            <div class="flex items-center">
                              <input type="radio" id="black" name="is_selling" required value="1" @if($restaurant->is_selling === 1) checked @endif />
                              <label for="black">表示</label>
                            </div>
                            <div class="flex items-center">
                              <input type="radio" id="none" name="is_selling" required value="0" @if($restaurant->is_selling === 0) checked @endif />
                              <label for="none">非表示</label>
                            </div>
                          </div>
                          <x-input-error class="mt-2" :messages="$errors->get('address')" />
                        </div>
                        <div class="text-center">
                          <button class="text-white w-40 bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</x-owner-layout>
