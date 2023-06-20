@extends('layout')
@section('content')
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <th scope="col" class="px-6 py-3">
            Username
        </th>
        <th scope="col" class="px-6 py-3">
            Last login
        </th>
        @foreach($admins as $admin)
        <tr class="bg-white border-b">
            <td class="px-6 py-4">
                <p>{{ $admin->username }}</p>
            </td>
            <td class="px-6 py-4">
                <p>{{ $admin->last_login }}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection