@extends('layouts.app')
@section('title', 'E-Sport')
@section('content')

{{-- Side Bar on Mobile Design --}}
<div id="b-mside"
    class="rounded-[100%] group group-hover:bg-slate-600 border-4 border-slate-600  bg-[#fee74c] opacity-50 hover:opacity-100 w-12 h-12 text-center  pt-1 fixed top-[30%] z-10 shadow-2xl left-2 cursor-pointer lg:hidden">
    <p class="font-bold text-2xl group-hover:text-white">></p>
</div>
<div class="bg-[#fee74c]  hidden lg:hidden top-0 left-0 bottom-0 right-0 overflow-scroll z-50" id="mside">
    <div class="p-4 xs:p-6 md:p-10">
        <div class="flex justify-between cursor-pointer" data-collapse-toggle="divisi_mpl"
                aria-controls="divisi_mpl">
                <p class="font-bold">Liga Bol</p>
                <img src="{{ asset('assets/img/dropdown.png') }}" alt="">
            </div>
            <ul class="ml-1" id="divisi_mpl">
                @foreach ($clubs as $club)
                    <li class="my-10 flex items-center hover:bg-slate-600 hover:text-white p-2 cursor-pointer">
                        {{ ucwords($club->nama_klub) }}
                    </li>
                @endforeach
            </ul>
    </div>
</div>
{{-- End --}}

<div class="container sm:flex sm:flex-col lg:flex-row sm:justify-between lg:mt-10 mx-auto">
    <div class="hidden lg:flex lg:flex-col sidenav drop-shadow-2xl bg-[#FBFBFB] w-[300px] h-[100%] p-5">
        <div>
            <div class="flex justify-between cursor-pointer" data-collapse-toggle="divisi_mpl"
                aria-controls="divisi_mpl">
                <p class="font-bold">Liga Bol</p>
                <img src="{{ asset('assets/img/dropdown.png') }}" alt="">
            </div>
            <ul class="ml-1" id="divisi_mpl">
                @foreach ($clubs as $club)
                    <li class="my-10 flex items-center hover:bg-slate-600 hover:text-white p-2 cursor-pointer">
                        {{ ucwords($club->nama_klub) }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="2xl:flex lg:mx-5 lg:h-full">
        <div class="middle drop-shadow-2xl">
            <div class="bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 banner md:h-[335px] h-full sm:rounded-xl px-12 py-6 flex md:flex-row flex-col object-fill bg-no-repeat bg-cover bg-left"
                >
                <div class="sm:flex sm:items-center flex flex-col items-center md:ml-20 lg:ml-0 sm:mr-0">
                    <div class="text-center">
                        <p class="font-bold text-[32px] xs:text-[62px] text-white">LB</p>
                        <p class="uppercase font-light xs:text-[24px] text-[18px] text-white">Liga Bola</p>
                    </div>
                    {{-- <div>
                        <img src="{{ asset('assets/img/banner/logompl.png') }}" class="xs:w-24">
                    </div> --}}
                    <div class="mt-4">
                        <button
                            class="hover:bg-slate-600 hover:text-white sm:py-2 sm:px-4 py-1 px-6 bg-white text-black flex items-center justify-between rounded-xl text-center">
                            <img src="{{ asset('assets/img/banner/loupe.png') }}"
                                class="sm:pr-2 hidden sm:flex">
                            Detail</button>
                    </div>
                </div>
                {{-- <div class="my-10 md:mt-10 xs:mx-auto lg:mx-10 lg:mt-24 xl:mt-0">
                    <img src="{{ asset('assets/img/banner/personmvp.png') }}"
                        class="w-64 xs:w-80 lg:w-[400px] xl:w-[380px]">
                </div> --}}
                {{-- <div class="md:mr-20 mx-auto ">
                    <div class="flex items-center my-3 md:my-8">
                        <img src="{{ asset('assets/img/banner/gun.png') }}" class="mr-4 w-8 ">
                        <p class="font-medium "><span class="font-bold text-2xl xs:text-3xl mr-2 shadow-2xl">111</span>
                            Kills</p>
                    </div>
                    <div class="flex items-center my-3 md:my-8">
                        <img src="{{ asset('assets/img/banner/gun.png') }}" class="mr-4 w-8">
                        <p class="font-medium "><span class="font-bold text-2xl xs:text-3xl mr-2 shadow-2xl">79</span>
                            Assist</p>
                    </div>
                    <div class="flex items-center my-3 md:my-8">
                        <img src="{{ asset('assets/img/banner/gun.png') }}" class="mr-4 w-8">
                        <p class="font-medium "><span class="font-bold text-2xl xs:text-3xl mr-2 shadow-2xl">45</span>
                            MVP</p>
                    </div>
                </div> --}}
            </div>
            <div class="md:mx-auto schedule mt-4 bg-[#FBFBFB] rounded-xl p-2 md:px-10 md:mt-10">
                <div class="flex sm:justify-between sm:items-center items-center sm:mt-5">
                    <div class="flex flex-col sm:flex-row items-start ">
                        <button
                            class="sm:py-2 sm:px-4 py-2 px-3 bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 rounded-lg shadow-md font-bold hover:bg-slate-600 text-white">Result</button>
                        <button
                            class="sm:py-2 sm:px-4 mt-4 sm:mt-0 py-2 px-3 bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 rounded-lg shadow-md mx-4 font-bold hover:bg-slate-600 text-white">Live</button>
                        <button
                            class="sm:py-2 sm:px-4 py-2 px-3 mt-4 sm:mt-0 bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 rounded-lg shadow-md font-bold hover:bg-slate-600 text-white">Replay</button>
                    </div>
                   
                </div>
                <div class="my-10">
                    @foreach ($matchs as $match)
                        <div class="bg-[#FFFDE4] p-4 shadow-md rounded-md flex justify-between items-center mt-4 font-bold">
                            <p class="sm:w-[70px] xs:w-[10px] ">FT</p>
                            <div class="flex items-center md:w-[80px] sm:w-[150px] xs:w-[100px]">
                                {{-- <img src="{{ asset('assets/img/logo/ae-256.png') }}" class="mr-2"> --}}
                                <p>{{ ucwords($match->club1->nama_klub) }}</p>
                            </div>
                            <p>{{ $match->score_1 }} - {{ $match->score_2 }}</p>
                            <div class="flex items-center sm:w-[150px] xs:w-[100px]">
                                {{-- <img src="{{ asset('assets/img/logo/btr-256.png') }}" class="mr-2"> --}}
                                <p>{{ ucwords($match->club2->nama_klub) }}</p>
                            </div>
                            <img src="{{ asset('assets/img/schedules/dots.png') }}"
                                class="w-[6px] sm:w-2 ml-3">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div
            class="flex flex-col  news drop-shadow-2xl bg-[#FBFBFB]  h-[100%] p-5 sm:mt-10 lg:mt-0 sm:mx-auto sm:w-full 2xl:w-[500px] 2xl:ml-5 sm:px-10">
            <div class="flex justify-between cursor-pointer">
                <p class="font-bold text-slate-600 text-xl md:text-3xl lg:text-2xl">Score Bol News</p>
            </div>
            <div class="flex flex-col lg:flex-row 2xl:flex-col">
                <div class="mt-6 lg:p-2">
                    <div class="relative">
                        <img src="{{ asset('assets/img/news/1.png') }}"
                            class=" w-[100%] sm:h-[300px] lg:h-[200px]">
                        <div class="dropback bg-[rgb(0,0,0,0.3)] w-[100%] h-[100%] absolute top-0 ">
                            <p
                                class="text-black absolute bottom-0 p-2 bg-[#fee74c] rounded-tr-md rounded-br-md font-bold drop-shadow-lg">
                                PUBG League Final</p>
                        </div>
                    </div>
                </div>
                <div class="mt-6 lg:p-2">
                    <div class="relative">
                        <img src="{{ asset('assets/img/news/2.png') }}"
                            class=" w-[100%] sm:h-[300px] lg:h-[200px]">
                        <div class="dropback bg-[rgb(0,0,0,0.3)] w-[100%] h-[100%] absolute top-0 ">
                            <p
                                class="text-black absolute bottom-0 p-2 bg-[#fee74c] rounded-tr-md rounded-br-md font-bold drop-shadow-lg">
                                Final Free Fire</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10">
                <div class="flex justify-between cursor-pointer">
                    <p class="font-bold text-slate-600 text-xl md:text-3xl">Live Streaming</p>
                </div>
                <div class="mt-6 md:mt-10">
                    <div class="flex">
                        <img src="{{ asset('assets/img/steram/v1.png') }}"
                            class="w-24 rounded-lg blur-[0.8px] md:w-60">
                        <div class="flex flex-col ml-4 md:ml-10 justify-center">
                            <p class="font-bold md:text-2xl 2xl:text-xl">Persija vs Persib</p>
                            <p class="font-light text-[14px] 2xl:text-sm md:text-xl">EL-Classico</p>
                        </div>
                    </div>
                </div>
                <div class="mt-6 md:mt-10">
                    <div class="flex">
                        <img src="{{ asset('assets/img/steram/v2.png') }}"
                            class="w-24 rounded-lg blur-[0.8px] md:w-60">
                        <div class="flex flex-col ml-4 md:ml-10 justify-center">
                            <p class="font-bold md:text-2xl 2xl:text-lg">Persib vs Arema</p>
                            <p class="font-light text-[14px] md:text-xl 2xl:text-sm">Perebutan Juara 3</p>
                        </div>
                    </div>
                </div>
                <div class="mt-6 md:mt-10">
                    <div class="flex">
                        <img src="{{ asset('assets/img/steram/v3.png') }}"
                            class="w-24 rounded-lg blur-[0.8px] md:w-60">
                        <div class="flex flex-col ml-4 md:ml-10 justify-center">
                            <p class="font-bold md:text-2xl 2xl:text-lg">Rans vs Pelita</p>
                            <p class="font-light text-[14px] md:text-xl 2xl:text-sm">Pertarungan Sengit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(document).ready(function () {
        $('#b-mside').click(function (e) {
            $('#mside').removeClass('hidden');
            $('#mside').addClass('fixed');
        });
        $('#close-mside').click(function (e) {
            $('#mside').removeClass('fixed');
            $('#mside').addClass('hidden');

        });
    });
</script>
@endsection