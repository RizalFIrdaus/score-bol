@extends('layouts.app')
@section('title', 'Score Bol')
@section('content')

<div class="container sm:flex sm:flex-col lg:flex-row sm:justify-between lg:mt-10 mx-auto">
    <div class="mx-auto">
        @if($errors->any())
            <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Danger</span>
                <div>
                    <span class="font-medium">Pastikan kamu memenuhi validasi ini:</span>
                    <ul class="mt-1.5 ml-4 list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @if(Session::has("success"))
            <div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 " role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    {{ Session::get("success") }}
                </div>
            </div>
        @endif
        <p class="text-4xl font-bold text-center">Klasemen Klub Sepak Bola</p>
        @if (Auth::user())
        <div class="flex justify-end">
            <form action="{{ route("clear") }}" method="POST">
                @csrf
                <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Clear</button>
            </form>
        </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Klub
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ma
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Me
                        </th>
                        <th scope="col" class="px-6 py-3">
                            S
                        </th>
                        <th scope="col" class="px-6 py-3">
                            K
                        </th>
                        <th scope="col" class="px-6 py-3">
                            GM
                        </th>
                        <th scope="col" class="px-6 py-3">
                            GK
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Point
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($classements as $classement)
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4 font-bold">
                                {{ ucwords($classement->club->nama_klub) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $classement->match }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $classement->win }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $classement->draw }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $classement->lose }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $classement->goal_win }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $classement->goal_lose }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $classement->point }}
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>


@endsection