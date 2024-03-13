<x-owner-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            レストラン情報
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
                  <div class="w-full mx-auto overflow-auto">
                    <div class="bg-white flex flex-col md:ml-auto w-full">
                      <div class="relative mb-4">
                        <label for="name" class="leading-7 text-sm text-gray-600">レストラン名</label>
                        <div class="">{{ $restaurant->name }}</div>
                      </div>
                      <div class="relative mb-4">
                        <label for="email" class="leading-7 text-sm text-gray-600">サムネイル</label>
                        <div class="w-80"><img src="{{ asset('storage/restaurant/' . $restaurant->img) }}"></div>
                      </div>
                      <div class="relative mb-4">
                        <label for="password_confirmation" class="leading-7 text-sm text-gray-600">説明</label>
                        <div class="">{!! nl2br(htmlspecialchars($restaurant->information)) !!}</div>
                      </div>
                      <div class="relative mb-4">
                        <label for="password_confirmation" class="leading-7 text-sm text-gray-600">営業時間</label>
                        <div class="">{!! nl2br(htmlspecialchars($restaurant->time)) !!}</div>
                      </div>
                      <div class="relative mb-4">
                        <label for="password_confirmation" class="leading-7 text-sm text-gray-600">予算</label>
                        <div class="">{{ $restaurant->budget }}</div>
                      </div>
                      <div class="relative mb-4">
                        <label for="password_confirmation" class="leading-7 text-sm text-gray-600">住所</label>
                        <div class="">
                          〒{{ $restaurant->zip }}<br>
                          @foreach(config('pref') as $pref_id => $name)
                              @if($pref_id == $restaurant->pref)
                                  {{ $name }}
                              @endif
                          @endforeach
                          {{ $restaurant->city }}{{ $restaurant->address }}
                        </div>
                      </div>
                      <div class="relative mb-4">
                        <label for="password_confirmation" class="leading-7 text-sm text-gray-600">表示・非表示</label>
                        <div class="">
                          @if ($restaurant->is_selling === 0) 非表示 @else 表示 @endif
                        </div>
                      </div>
                    </div>
                    <a href="{{ route('owner.restaurant.edit') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">修正</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <script>
      function deletePost(e) {
        'use strict';
        if(confirm('本当に削除してもいいですか?')) document.getElementById('delete_' + e.dataset.id).submit();
      }
    </script>
</x-owner-layout>
