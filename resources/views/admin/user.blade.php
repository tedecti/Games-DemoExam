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
        <th scope="col" class="px-6 py-3">
            Ban
        </th>
        <tr class="bg-white border-b">
            <td class="px-6 py-4">
                <p>{{ $user->username }}</p>
            </td>
            <td class="px-6 py-4">
                <p>{{ $user->last_login }}</p>
            </td>
            <td class="px-6 py-4">
                <p>{{ $user->created_at }}</p>
            </td>
            <form method="post" action="{{ route('admin.ban', $user->username) }}">
                @csrf
                <td class="px-6 py-4">
                    <select name="ban_reason">
                        <option selected value="You have been blocked by an administrator">You have been blocked by an administrator</option>
                        <option value="You have been blocked for spamming">You have been blocked for spamming</option>
                        <option value="You have been blocked for cheating">You have been blocked for cheating</option>
                    </select>
                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Ban</button>
                </td>
            </form>
        </tr>
    </table>
</div>
@endsection