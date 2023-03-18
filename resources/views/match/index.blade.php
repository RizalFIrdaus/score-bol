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
        <p class="text-3xl font-semibold">Masukan skor terbaru</p>
        <form action="{{ route("store.match") }}" method="POST">
            @csrf
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                <table class="w-full text-sm text-left text-gray-500 " >
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Klub 1  
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Score
                            </th>
                            <th scope="col" class="px-6 py-3">
                                
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Score
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Klub 2
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody id="dynamicAddRemove">
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                <select name="inputaddMoreInputFields[0][nama_klub1]" id="nama_klub" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="" selected>Pilih Klub</option>
                                    @foreach ($clubs as $club)
                                        <option value="{{ $club->id }}">{{ ucwords($club->nama_klub)  }}</option>
                                    @endforeach
                                  </select>
                            </th>
                            <td class="py-4">
                                <input type="text" name="inputaddMoreInputFields[0][score1]" id="klub1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-16 p-2.5 " placeholder="Cth: 1">
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-bold text-4xl">-</p>
                            </td>
                            <td class="px-6 py-4">
                                <input type="text" name="inputaddMoreInputFields[0][score2]" id="klub1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-16 p-2.5 " placeholder="Cth: 4">
                            </td>
                            <td class="px-6 py-4">
                                <select name="inputaddMoreInputFields[0][nama_klub2]" id="nama_klub" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="" selected>Pilih Klub</option>
                                    @foreach ($clubs as $club)
                                        <option value="{{ $club->id }}">{{ ucwords($club->nama_klub)  }}</option>
                                    @endforeach
                                  </select>
                            </td>
                            <td class="px-6 py-4">
                                <button type="button" id="dynamic-input"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tambahkan match</button>
                            </td>
                        </tr>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <button type="submit" class="w-full text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-bold text-xl rounded-full py-2.5 text-center mb-2 dark:focus:ring-yellow-900">Simpan</button>
                                </td>
                        </tfoot>
                    </tbody>
                   
                </table>
            </div>
        </form>
    </div>
</div>

</div>

@endsection


@section('scripts')
<script type="text/javascript">
    var i = 0;
    $("#dynamic-input").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr class="bg-white border-b"><th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap "><select name="inputaddMoreInputFields['+i+'][nama_klub1]" id="nama_klub" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><option value="" selected>Pilih Klub</option>@foreach ($clubs as $club)<option value="{{ $club->id }}">{{ ucwords($club->nama_klub)  }}</option>@endforeach</select></th><td class="py-4"><input type="text" name="inputaddMoreInputFields['+i+'][score1]" id="klub1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-16 p-2.5 " placeholder="Cth: 1"></td><td class="px-6 py-4"><p class="font-bold text-4xl">-</p></td><td class="px-6 py-4"><input type="text" name="inputaddMoreInputFields['+i+'][score2]" id="klub1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-16 p-2.5 " placeholder="Cth: 4"></td><td class="px-6 py-4"><select name="inputaddMoreInputFields['+i+'][nama_klub2]" id="nama_klub" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><option value="" selected>Pilih Klub</option>@foreach ($clubs as $club)<option value="{{ $club->id }}">{{ ucwords($club->nama_klub)  }}</option>@endforeach</select></td><td class="px-6 py-4"><button type="button" id="dynamic-input" class="font-medium text-blue-600 dark:text-blue-500 hover:underline remove-input-field">Hapus</button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection