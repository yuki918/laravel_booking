<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            オーナー一覧
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
                    <a href="{{ route('admin.owner.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">新規作成</a>
                  </div>
                  <div class="w-full mx-auto overflow-auto">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                      <thead>
                        <tr>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">お名前</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ID</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メールアドレス</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">編集</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">削除</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($owners as $item)
                          <tr>
                            <td class="px-4 py-3 border-2">{{ $item['name'] }}</td>
                            <td class="px-4 py-3 border-2">{{ $item['id'] }}</td>
                            <td class="px-4 py-3 border-2">{{ $item['email'] }}</td>
                            <td class="px-4 py-3 border-2">
                              <a href="{{ route('admin.owner.edit', $item->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">詳細</a>
                            </td>
                            <td class="px-4 py-3 border-2">
                              <form id="delete_{{ $item->id }}" method="POST" action="{{ route('admin.owner.destroy', $item->id) }}">
                                @csrf
                                @method('delete')
                                <a data-id="{{ $item->id }}" onclick="deletePost(this)" class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition">削除</a>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
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
</x-admin-layout>
