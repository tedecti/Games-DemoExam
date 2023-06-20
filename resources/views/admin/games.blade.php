@extends('layout')
@section('content')
<form method="get" action="{{ route('admin.games') }}">
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        <input name="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search Mockups, Logos...">
        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
    </div>
</form>

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <th scope="col" class="px-6 py-3">
            Title
        </th>
        <th scope="col" class="px-6 py-3">
            Description
        </th>
        <th scope="col" class="px-6 py-3">
            Author
        </th>
        @foreach($games as $game)
        <tr class="border-b {{$game->deleted_at?'bg-red-100':'bg-white'}}">
            <td class="px-6 py-4">
                <a href="{{ route('admin.game', $game->slug) }}"><b>{{ $game->title }}</b></a>
            </td>
            <td class="px-6 py-4">
                <p>{{ $game->description }}
            </td>
            </td>
            <td class="px-6 py-4">
                <p>{{ $game->user->username }}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection