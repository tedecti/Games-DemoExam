@extends('layout')
@section('content')
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <th scope="col" class="px-6 py-3">
            Username
        </th>
        <th scope="col" class="px-6 py-3">
            Registered
        </th>
        <th scope="col" class="px-6 py-3">
            Last login
        </th>
        @foreach($users as $user)
        <tr class="border-b {{$user->ban_reason?'bg-red-100':'bg-white'}}">
            <td class="px-6 py-4">
                <b><a href="{{ route('admin.user', $user->username) }}">{{ $user->username }}</a></b>
            </td>
            <td class="px-6 py-4">
                <p>{{ $user->created_at }}
            </td>
            <td class="px-6 py-4">
                <p>{{ $user->last_login }}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection