@extends('layout')
@section('content')
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500-400 ">
        <th scope="col" class="px-6 py-3">
            Title
        </th>
        <th scope="col" class="px-6 py-3">
            Description
        </th>
        <th scope="col" class="px-6 py-3">
            Author
        </th>
        @if($game->thumbnail)
        <th scope="col" class="px-6 py-3">
            Thumbnail
        </th>
        @endif
        <th scope="col" class="px-6 py-3">
            Created
        </th>
        @if (null == $game->deleted_at)
        <th scope="col" class="px-6 py-3">
            Action
        </th>
        @endif
        <tr class="border-b {{$game->deleted_at?'bg-red-100':'bg-white'}}">
            <td class="px-6 py-4">
                <p><b>{{ $game->title }}@isset($game->deleted_at) (deleted) @endisset</b></p>
            </td>
            <td class="px-6 py-4">
                <p>{{ $game->description }}</p>
            </td>
            </td>
            <td class="px-6 py-4">
                <p>{{ $game->user->username }}</p>
            </td>
            @if($game->thumbnail)
            <td class="px-6 py-4">
                <img src="{{ $game->thumbnail }}" alt='image'>
            </td>
            @endif
            <td class="px-6 py-4">
                <p>{{ $game->created_at }}</p>
            </td>
            @if (null == $game->deleted_at)
            <form method="post" action="{{ route('game.destroy', $game->slug) }}">
                @csrf
                @method('DELETE')
                <td class="px-6 py-4">
                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Delete</button>
                </td>
            </form>
            @endif
        </tr>
    </table>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-50">
                        Версия
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Пользователь
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50">
                        Счет
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($game->game_version as $version)
                @foreach($version->game_score as $score)
                <tr class="border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                        {{ $version->id }}
                    </th>
                    <td class="px-6 py-4">
                        <details class="relative">
                            <summary>
                                {{$score->user->username}}
                            </summary>
                            <div class="absolute p-8 bg-white z-10">
                                <form action="{{route('scoreByUser.destroy',[$game->slug, $score->user->id])}}" class="" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-2 py-1 ">DELETE USER SCORES</button>
                                </form>
                            </div>
                        </details>
                    </td>
                    <td class="px-6 py-4 bg-gray-50 flex flex-row gap-4">{{$score->score}}</p>
                        <form method="post" action="{{ route('scoreById.destroy', $score->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
        @isset($score)
        <form method="post" action="{{ route('scoreByGame.destroy', $game->slug) }}">
            @csrf
            @method('DELETE')
            <td class="px-6 py-4">
                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Delete all scores in game</button>
            </td>
        </form>
        @endisset
    </div>
</div>
@endsection