<x-admin-layout>
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
                    <a href="{{ route('admin.owner.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">一覧</a>
                  </div>
                  <div class="w-full mx-auto overflow-auto">
                    <form method="POST" action="{{ route('admin.owner.update', $owner->id) }}">
                      @method('PUT')
                      @csrf
                      <div class="bg-white flex flex-col md:ml-auto w-full">
                        <div class="relative mb-4">
                          <label for="name" class="leading-7 text-sm text-gray-600">お名前</label>
                          <input type="text" id="name" name="name" value="{{ $owner->name }}" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="relative mb-4">
                          <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                          <input type="email" id="email" name="email" value="{{ $owner->email }}" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div class="relative mb-4">
                          <label for="password_confirmation" class="leading-7 text-sm text-gray-600">レストラン名</label>
                          <div class="">{{ $owner->RestaurantInfo->name }}</div>
                        </div>
                        <div class="relative mb-4">
                          <label for="password" class="leading-7 text-sm text-gray-600">パスワード</label>
                          <input type="password" id="password" name="password" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <x-input-error class="mt-2" :messages="$errors->get('password')" />
                        </div>
                        <div class="relative mb-4">
                          <label for="password_confirmation" class="leading-7 text-sm text-gray-600">パスワード【確認用】</label>
                          <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
</x-admin-layout>
