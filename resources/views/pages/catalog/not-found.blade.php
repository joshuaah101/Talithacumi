@extends('layout.blueprint')

@section('title')
    Catalogue
@endsection

@section('body')
   <div class="font-montserrat font-semibold text-2xl text-red-600 uppercase flex flex-col space-y-12 items-center justify-center h-screen">
    {{-- page not found --}}
    {{-- <span class="material-icons-outlined text-[6rem]">
        block
    </span> --}}
    <img src="{{ asset('storage/img/png/logo.png') }}" alt="" class="w-16 md:w-20">
    <div class="flex flex-col space-y-5">
        <span class="text-lg">
            error 404 | <span class="text-gray-800">page not found</span>
        </span>
     <div class="flex justify-center">
        <a href="/" class="px-10 py-1 bg-red-600 text-red-100 font-medium font-oswald rounded-md hover:bg-[#CC9E5A] text-sm transition duration-300 ease-in">
            Home
        </a>
     </div>
    </div>
</div>
@endsection
