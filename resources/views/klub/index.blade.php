@extends('layouts.app')
@section('title', 'Score Bol')
@section('content')

<div class="container sm:flex sm:flex-col lg:flex-row sm:justify-between lg:mt-10 mx-auto">
    <div class="mx-auto">
        @if($errors->any())
        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 "
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
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
    @if (Session::has("success"))
    <div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 " role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div>
          {{ Session::get("success") }}
        </div>
      </div>
    @endif
        <p class="text-3xl font-semibold">Daftar Klub</p>
        <p class="font-light text-sm">Ayo daftarkan klub mu untuk bertanding dengan klub terbaik.</p>
        <form action="{{ route("store.club") }}" method="POST">
            @csrf
            <div class="w-96 mt-4">
                <label for="nama_klub" class="block mb-2 text-sm font-medium text-gray-900">Nama Klub</label>
                <input type="text" name="nama_klub" id="nama_klub" aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                    placeholder="Cth: Arema">
            </div>
            <div class="w-96 mt-4">
                <label for="kota_klub" class="block mb-2 text-sm font-medium text-gray-900">Kota Klub</label>
                <input type="text" name="kota_klub" id="kota_klub" aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Cth: Malang">
            </div>
            <div class="flex justify-end mt-4">
                <button type="submit"
                    class="text-white font-bold bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">Daftar</button>
            </div>
        </form>
    </div>
</div>


@endsection