@extends('layout.blueprint')

@section('title')
    Home
@endsection

@section('body')
    {{-- mobile menu --}}
    <div class="hidden shadow-md sticky top-0 right-0 z-20 h-screen overflow-y-auto w-full transition duration-300 ease-in" id="mobile-menu">
        <div class="bg-amber-900 px-4 py-3 my-auto space-y-12 flex flex-col">
            <div class="flex items-center justify-between">
                <a href="/" class="">
                    <img src="{{ asset('storage/img/png/logo.png') }}" alt="" class="w-10">
                </a>

                <a href="#" class="transition duration-300 ease-in" id="close">
                    <span class="material-icons-outlined text-4xl font-bold text-red-100 hover:text-red-700">
                        &times;
                    </span>
                </a>
            </div>

            <div class="space-y-5 flex flex-col px-2">
                <div class="space-y-3 flex flex-col">
                    <span class="text-gray-400">
                        #Menu
                    </span>

                    <div class="flex space-x-2 items-center">
                        <span class="material-icons-outlined text-[#CC9E5A]">
                            home
                        </span>
                        <a href="/" class="text-[#CC9E5A] font-semibold">
                            Home
                        </a>
                    </div>

                    <div class="flex space-x-2 items-center">
                        <span class="material-icons-outlined text-amber-50 hover:text-amber-700 transition duration-300 ease-in">
                            info
                        </span>
                        <a href="/about" class="text-amber-50 hover:text-amber-700 transition duration-300 ease-in font-semibold">
                            About
                        </a>
                    </div>
                </div>

                <div class="space-y-3 flex flex-col mt-16">
                    <span class="text-gray-400">
                        #Categories
                    </span>



                    @foreach ($categories as $category)
                        <a href="{{ url('catalog/'.$category->catId) }}" class="hover:text-[#CC9E5A] text-amber-50 transition duration-300 ease-in space-x-2 flex items-center">
                            <span class="material-icons-outlined">
                                {{ $category->icon }}
                            </span>
                            <span>
                                {{ ucfirst($category->category) }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <nav class="bg-amber-900 w-full shadow-md sticky top-0 z-10 border-b-2 border-[#CC9E5A]">
        <div class="flex sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto justify-between items-center py-3 px-5 md:px-0">
            <a href="/" class="">
                <img src="{{ asset('storage/img/png/logo.png') }}" alt="" class="w-10 md:w-12">
                {{-- <span class="font-semibold">Talithacumi Global Concept</span> --}}
            </a>

            <div class="hidden md:flex items-center space-x-5 font-semibold text-sm font-poppins tracking-wide">
                <a href="/" class="{{ request()->is('/') ? 'text-[#CC9E5A] font-bold' : 'text-amber-50 font-semibold hover:text-[#CC9E5A]' }} transition duration-300 ease-in">
                    Home
                </a>

                <a href="/about" class="{{ request()->is('about') ? 'text-[#CC9E5A] font-bold' : 'text-amber-50 font-semibold hover:text-[#CC9E5A]' }} transition duration-300 ease-in">
                    About
                </a>
            </div>

            <button class="shadow-sm rounded flex items-center md:hidden" id="btn-menu">
                <span class="material-icons-outlined text-amber-50 text-3xl">
                    menu
                </span>
            </button>
        </div>
    </nav>

{{-- sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl --}}
    <header class="flex flex-col w-full h-[70vh] md:h-[80vh]">
        <div id="animation-carousel" class="relative z-0 w-full h-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative w-full h-full overflow-hidden rounded-none md:rounded-sm">
                @foreach ($sliders as $slider)
                    <div class="hidden duration-700 ease-in-out box-border" data-carousel-item="active">
                        <img src="{{ asset('storage/img/jpg/sliders/'.$slider->img_name.'.'.$slider->img_ext ) }}" class=" w-full h-full object-fit" alt="{{ $slider->img_name }}">
                    </div>
                @endforeach

                <!-- Slider indicators -->
                <div class="absolute z-30 space-x-3 -translate-x-1/2 bottom-5 left-1/2 hidden md:flex">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>
            </div>

            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>

            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </header>

    <main class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto space-y-12 px-5 md:px-0">
        {{-- categories --}}
        <div class="bg-amber-900 px-8 py-6 space-y-6 hidden md:flex md:flex-col shadow-md rounded-none md:rounded-bl-lg md:rounded-br-lg mt-1 w-[85%] mx-auto">
            <div class="text-lg text-amber-100 font-montserrat font-bold flex items-center justify-center space-x-2">
                <span class="material-icons-outlined  ">
                    account_tree
                </span>
                <span class="">
                    Categories
                </span>
            </div>
            <hr>

            <div class="flex overflow-x-auto whitespace-nowrap space-x-10 py-4 items-center">
                <span class="text-2xl text-gray-100 animate-pulse">&lt;</span>
                @foreach ($categories as $category)
                <a href="{{ url('catalog/'.$category->catId) }}" class="hover:text-[#CC9E5A] text-amber-50 transition duration-300 ease-in space-x-2 flex items-center">
                    <span class="material-icons-outlined">
                        {{ $category->icon }}
                    </span>
                    <span>
                        {{ ucfirst($category->category) }}
                    </span>
                </a>
                @endforeach
                <span class="text-2xl text-gray-100 animate-pulse">&gt;</span>
            </div>
        </div>
    



        {{-- flash blocks --}}
        <section class="flex flex-col space-y-6">
            {{-- block 1 --}}
            <div class="text-md text-amber-100 rounded rounded-bl-lg rounded-br-lg px-5 py-3 font-montserrat font-bold bg-amber-900 flex items-center space-x-2">
                <span class="material-icons-outlined">
                    bolt
                </span>
                <span class="">
                    Product flash
                </span>
            </div>

            <!-- Display the images -->
            <div class="slider flex flex-row w-full bg-white">
                @foreach ($products as $product)
                    <div class="slide h-56 w-full relative image-container">
                        <img src="{{ asset('storage/img/jpg/'.$product->category.'/'.$product->img_name.'.'.$product->img_ext) }}" alt="{{ $product->img_name }}" class="w-full h-full rounded-md border-4 border-transparent">

                        {{-- overlay --}}
                        <div class="overlay flex justify-center items-center flex-col space-y-4 w-full px-2">
                            <span class="text-base font-semibold text-white capitalize">
                                {{ $product->product_name }}
                            </span>
                            <div class="flex flex-col space-y-2 w-full justify-center items-center">
                                @foreach($contacts as $contact)
                                    <a href="https://wa.me/{{ $contact->whatsapp }}?text=Hello%20good%20day,%0A%0AI%20will%20like%20to%20enquire%20about%20this%20*{{ $product->product_name }}*" class="text-green-50 rounded-md px-8 py-2 hover:bg-green-50 hover:text-green-500 transition duration-300 ease-in text-xs text-center" target="_blank">
                                        Get product
                                    </a>
                                @endforeach
                                <a href="{{ url('catalog/'.$product->catId) }}" class="rounded-md text-amber-100 px-6 py-1 font-semibold hover:bg-amber-50 transition duration-300 ease-in hover:text-orange-500 text-xs text-center">
                                    View more
                                </a>
                            </div>
                        </div>                    
                    </div>
                @endforeach
            </div>
        </section>


        {{-- Kids corner --}}
        <section class="flex flex-col space-y-6">
            {{-- block 1 --}}
            <div class="text-md text-amber-100 rounded rounded-bl-lg rounded-br-lg px-5 py-3 font-montserrat font-bold bg-amber-900 flex items-center space-x-2">
                <span class="material-icons-outlined  ">
                    child_care
                </span>
                <span class="">
                    Kids Corner
                </span>
            </div>

            <!-- Display the images -->
            <div class="slider flex flex-row w-full bg-white">
                @foreach($kidsCorner as $kids)
                    <div class="slide h-56 w-full relative image-container">
                        <img src="{{ asset('storage/img/jpg/'.$kids->category.'/'.$kids->img_name.'.'.$kids->img_ext) }}" alt="{{ $kids->img_name }}" class="w-full h-full rounded-md border-4 border-transparent">

                        {{-- overlay --}}
                        <div class="overlay flex justify-center items-center flex-col space-y-4 w-full px-2">
                            <span class="text-base font-semibold text-white capitalize">
                                {{ $product->product_name }}
                            </span>
                            <div class="flex flex-col space-y-2 w-full justify-center items-center">
                                @foreach($contacts as $contact)
                                    <a href="https://wa.me/{{ $contact->whatsapp }}?text=Hello%20good%20day,%0A%0AI%20will%20like%20to%20enquire%20about%20this%20*{{ $product->product_name }}*" class="text-green-50 rounded-md px-8 py-2 hover:bg-green-50 hover:text-green-500 transition duration-300 ease-in text-xs text-center" target="_blank">
                                        Get product
                                    </a>
                                @endforeach
                                <a href="{{ url('catalog/'.$kids->catId) }}" class="rounded-md text-amber-100 px-6 py-1 font-semibold hover:bg-amber-50 transition duration-300 ease-in hover:text-orange-500 text-xs text-center">
                                    View more
                                </a>
                            </div>
                        </div>                    
                    </div>
                @endforeach
            </div>
        </section>


        {{-- parallax effect --}}
        <section class="flex justify-center items-center bg-no-repeat bg-cover bg-fixed bg-center min-h-[23rem] px-8 py-6 my-8 rounded" style="background-image: linear-gradient(to bottom, rgba(20, 3, 3, 0.16), rgba(8, 8, 34, 0.224)),url('{{ asset('storage/img/jpg/parallax/wood-bg.jpg'); }}')">
            <div class="flex flex-col space-y-8">
                <header class="flex justify-center text-2xl md:text-4xl font-montserrat font-semibold text-amber-50">
                    Our Creed
                </header>
                <p class="text-white font-semibold font-montserrat flex flex-wrap text-base md:text-xl text-center">
                   At {{ config('app.name') }}, we handcraft custom furniture with attention to detail using the finest materials. From initial design to finishing touches, we create unique pieces that reflect your style and personality. With a commitment to sustainability, our furniture is built to last and minimize environmental impact.
                </p>
            </div>
        </section>

        <section class="flex flex-col space-y-6">
             {{-- block 2 --}}
            <div class="text-md text-amber-100 rounded rounded-bl-lg rounded-br-lg px-5 py-3 font-montserrat font-bold bg-amber-900 flex items-center space-x-2">
                <span class="material-icons-outlined  ">
                    sell
                </span>
                <span class="">
                    Products below #30,000
                </span>
            </div>

            <!-- Display the images -->
            <div class="slider flex flex-row w-full bg-white">
                @foreach($priceCheckBelow30k as $below30k)
                    <div class="slide h-56 w-full relative image-container">
                        <img src="{{ asset('storage/img/jpg/'.$below30k->category.'/'.$below30k->img_name.'.'.$below30k->img_ext) }}" alt="{{ $below30k->img_name }}" class="w-full h-full rounded-md border-4 border-transparent">

                        {{-- overlay --}}
                        <div class="overlay flex justify-center items-center flex-col space-y-4 w-full px-2">
                            <span class="text-base font-semibold text-white capitalize">
                                {{ $product->product_name }}
                            </span>
                            <div class="flex flex-col space-y-2 w-full justify-center items-center">
                                @foreach($contacts as $contact)
                                    <a href="https://wa.me/{{ $contact->whatsapp }}?text=Hello%20good%20day,%0A%0AI%20will%20like%20to%20enquire%20about%20this%20*{{ $product->product_name }}*" class="text-green-50 rounded-md px-8 py-2 hover:bg-green-50 hover:text-green-500 transition duration-300 ease-in text-xs text-center" target="_blank">
                                        Get product
                                    </a>
                                @endforeach
                                <a href="{{ url('catalog/'.$below30k->catId) }}" class="rounded-md text-amber-100 px-6 py-1 font-semibold hover:bg-amber-50 transition duration-300 ease-in hover:text-orange-500 text-xs text-center">
                                    View more
                                </a>
                            </div>
                        </div>                    
                    </div>
                @endforeach
            </div>
        </section>

        <section class="flex flex-col space-y-6">
            {{-- block 2 --}}
            <div class="text-md text-amber-100 rounded rounded-bl-lg rounded-br-lg px-5 py-3 font-montserrat font-bold bg-amber-900 flex items-center space-x-2">
                <span class="material-icons-outlined  ">
                    sell
                </span>
                <span class="">
                    For Office Use
                </span>
            </div>

            <!-- Display the images -->
            <div class="slider flex flex-row w-full bg-white">
                @foreach($officeUse as $office)
                    <div class="slide h-56 w-full relative image-container">
                        <img src="{{ asset('storage/img/jpg/'.$office->category.'/'.$office->img_name.'.'.$office->img_ext) }}" alt="{{ $office->img_name }}" class="w-full h-full rounded-md border-4 border-transparent">

                        {{-- overlay --}}
                        <div class="overlay flex justify-center items-center flex-col space-y-4 w-full px-2">
                            <span class="text-base font-semibold text-white capitalize">
                                {{ $product->product_name }}
                            </span>
                            <div class="flex flex-col space-y-2 w-full justify-center items-center">
                                @foreach($contacts as $contact)
                                    <a href="https://wa.me/{{ $contact->whatsapp }}?text=Hello%20good%20day,%0A%0AI%20will%20like%20to%20enquire%20about%20this%20*{{ $product->product_name }}*" class="text-green-50 rounded-md px-8 py-2 hover:bg-green-50 hover:text-green-500 transition duration-300 ease-in text-xs text-center" target="_blank">
                                        Get product
                                    </a>
                                @endforeach
                                <a href="{{ url('catalog/'.$office->catId) }}" class="rounded-md text-amber-100 px-6 py-1 font-semibold hover:bg-amber-50 transition duration-300 ease-in hover:text-orange-500 text-xs text-center">
                                    View more
                                </a>
                            </div>
                        </div>                    
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    @foreach ($contacts as $contact)
    <footer class="bg-amber-900 w-full mt-3 py-6">
        <div class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto px-5 md:px-0">
            <div class="text-amber-50 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-5 gap-x-0 md:gap-x-16">
                <div class="flex items-center justify-center">
                    {{-- <header class="font-poppins text-lg font-medium text-[#CC9E5A]">
                        Follow us!
                    </header> --}}
                    <div class="flex flex-col items-center justify-center space-y-2">
                        <img src="{{ asset('storage/img/png/logo.png') }}" alt="" class="w-36">
                        <span class="font-montserrat font-semibold font-md text-gray-100">
                            {{ config('app.name') }}
                        </span>
                    </div>
                </div>

                <div class="flex flex-col space-y-5">
                   <div class="flex flex-col space-y-5">
                        <header class="font-poppins text-lg font-medium text-[#CC9E5A]">
                            Contact us!
                        </header>

                        <div class="leading-relaxed flex flex-col space-y-2">
                            <header class="font-medium text-sm">
                                Head Office:
                            </header>
                            <span class="font-normal text-xs">
                                Talithacumi junction, Ijeun Lukosi, behind federal secretariat, Oke Mosan, Abeokuta, Ogun state.
                            </span>
                        </div>

                        <div class="leading-relaxed flex flex-col space-y-2">
                            <header class="font-medium text-sm">
                                Branch Office:
                            </header>
                            <span class="font-normal text-xs">
                                Talithacumi workshop - Igbo Itoku road, Kobape, Ogun state.
                            </span>
                        </div>
                   </div>

                   <div class="flex flex-col space-y-4">
                        <a href="tel:+{{ $contact->phone_number }}" class="font-medium text-xs hover:text-[#CC9E5A] transition duration-300 ease-in flex items-center space-x-2" target="_blank">
                            <svg class="w-5 h-5" viewBox="0 0 15 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 3.8.1 (29687) - http://www.bohemiancoding.com/sketch -->
                                <title>call [#192]</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Dribbble-Dark-Preview" transform="translate(-103.000000, -7321.000000)" fill="#FFFFFF">
                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                            <path d="M61.7302966,7173.99596 C61.2672966,7175.40296 59.4532966,7176.10496 58.1572966,7175.98796 C56.3872966,7175.82796 54.4612966,7174.88896 52.9992966,7173.85496 C50.8502966,7172.33496 48.8372966,7169.98396 47.6642966,7167.48896 C46.8352966,7165.72596 46.6492966,7163.55796 47.8822966,7161.95096 C48.3382966,7161.35696 48.8312966,7161.03996 49.5722966,7161.00296 C50.6002966,7160.95296 50.7442966,7161.54096 51.0972966,7162.45696 C51.3602966,7163.14196 51.7112966,7163.84096 51.9072966,7164.55096 C52.2742966,7165.87596 50.9912966,7165.93096 50.8292966,7167.01396 C50.7282966,7167.69696 51.5562966,7168.61296 51.9302966,7169.09996 C52.6632966,7170.05396 53.5442966,7170.87696 54.5382966,7171.50296 C55.1072966,7171.86196 56.0262966,7172.50896 56.6782966,7172.15196 C57.6822966,7171.60196 57.5872966,7169.90896 58.9912966,7170.48196 C59.7182966,7170.77796 60.4222966,7171.20496 61.1162966,7171.57896 C62.1892966,7172.15596 62.1392966,7172.75396 61.7302966,7173.99596 C61.4242966,7174.92396 62.0362966,7173.06796 61.7302966,7173.99596" id="call-[#192]"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <span class="">
                                +{{ $contact->phone_number }}
                            </span>
                        </a>
                        <a href="https://wa.me/{{ $contact->whatsapp }}?text=Hello%20good%20day" class="font-medium text-xs hover:text-[#CC9E5A] transition duration-300 ease-in flex items-center space-x-2" target="_blank">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 3.8.1 (29687) - http://www.bohemiancoding.com/sketch -->
                                <title>whatsapp [#128]</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Dribbble-Dark-Preview" transform="translate(-300.000000, -7599.000000)" fill="#FFFFFF">
                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                            <path d="M259.821,7453.12124 C259.58,7453.80344 258.622,7454.36761 257.858,7454.53266 C257.335,7454.64369 256.653,7454.73172 254.355,7453.77943 C251.774,7452.71011 248.19,7448.90097 248.19,7446.36621 C248.19,7445.07582 248.934,7443.57337 250.235,7443.57337 C250.861,7443.57337 250.999,7443.58538 251.205,7444.07952 C251.446,7444.6617 252.034,7446.09613 252.104,7446.24317 C252.393,7446.84635 251.81,7447.19946 251.387,7447.72462 C251.252,7447.88266 251.099,7448.05372 251.27,7448.3478 C251.44,7448.63589 252.028,7449.59418 252.892,7450.36341 C254.008,7451.35771 254.913,7451.6748 255.237,7451.80984 C255.478,7451.90987 255.766,7451.88687 255.942,7451.69881 C256.165,7451.45774 256.442,7451.05762 256.724,7450.6635 C256.923,7450.38141 257.176,7450.3464 257.441,7450.44643 C257.62,7450.50845 259.895,7451.56477 259.991,7451.73382 C260.062,7451.85686 260.062,7452.43903 259.821,7453.12124 M254.002,7439 L253.997,7439 L253.997,7439 C248.484,7439 244,7443.48535 244,7449 C244,7451.18666 244.705,7453.21526 245.904,7454.86076 L244.658,7458.57687 L248.501,7457.3485 C250.082,7458.39482 251.969,7459 254.002,7459 C259.515,7459 264,7454.51465 264,7449 C264,7443.48535 259.515,7439 254.002,7439" id="whatsapp-[#128]"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <span class="">
                                 +{{ $contact->whatsapp }}
                            </span>
                        </a>
                        <a href="mailto:{{ $contact->email }}" class="font-medium text-xs hover:text-[#CC9E5A] transition duration-300 ease-in flex items-center space-x-2" target="_blank">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 3.8.1 (29687) - http://www.bohemiancoding.com/sketch -->
                                <title>email [#1564]</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Dribbble-Dark-Preview" transform="translate(-260.000000, -959.000000)" fill="#FFFFFF">
                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                            <path d="M208,801.586 C208,801.034 208.448,801 209,801 L219,801 C219.552,801 220,801.034 220,801.586 L220,802.835 L214.447,805.612 C214.166,805.752 213.834,805.752 213.553,805.612 L208,802.835 L208,801.586 Z M206.276,804.209 L213.106,807.624 C213.669,807.906 214.331,807.906 214.894,807.624 L221.724,804.209 C221.893,804.125 222,803.952 222,803.762 L222,800.586 C222,799.481 221.105,799 220,799 L208,799 C206.895,799 206,799.481 206,800.586 L206,803.762 C206,803.952 206.107,804.125 206.276,804.209 L206.276,804.209 Z M222,815.586 C222,816.138 221.552,817 221,817 L207,817 C206.448,817 206,816.138 206,815.586 L206,809.116 C206,808.745 206.391,808.503 206.724,808.669 C210.9,810.757 209.617,810.116 213.119,811.867 C213.674,812.145 214.328,812.149 214.886,811.877 C218.357,810.193 216.898,810.897 221.284,808.791 C221.615,808.631 222,808.873 222,809.242 L222,815.586 Z M221.106,806.518 L214.447,809.848 C214.166,809.988 213.834,809.988 213.553,809.848 L206.894,806.518 C205.565,805.854 204,806.821 204,808.307 L204,816.586 C204,817.691 204.895,819 206,819 L222,819 C223.105,819 224,817.691 224,816.586 L224,808.307 C224,806.821 222.435,805.854 221.106,806.518 L221.106,806.518 Z" id="email-[#1564]"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <span class="">
                            {{ $contact->email }}
                            </span>
                        </a>
                   </div>
                </div>

                <div class="flex flex-col space-y-5">
                    <header class="font-poppins text-lg font-medium text-[#CC9E5A]">
                        Careers
                    </header>

                    <div class="font-medium text-xs flex flex-col space-y-2 capitalize">
                        <a href="#" class="font-medium text-xs hover:text-[#CC9E5A] transition duration-300 ease-in">
                            Industrial Training
                        </a>

                        <a href="#" class="font-medium text-xs hover:text-[#CC9E5A] transition duration-300 ease-in">
                            S.I.W.E.S
                        </a>

                        <a href="#" class="font-medium text-xs hover:text-[#CC9E5A] transition duration-300 ease-in">
                            Apprenticeship
                        </a>

                        <a href="#" class="font-medium text-xs hover:text-[#CC9E5A] transition duration-300 ease-in">
                            Attachment
                        </a>

                        <a href="#" class="font-medium text-xs hover:text-[#CC9E5A] transition duration-300 ease-in">
                            Internship
                        </a>
                    </div>
               </div>

               <div class="flex flex-col space-y-5">
                    <header class="font-poppins text-lg font-medium text-[#CC9E5A]">
                        Quick links
                    </header>

                    <div class="font-medium text-xs flex flex-col space-y-2 capitalize">
                        <a href="/about" class="font-medium text-xs hover:text-[#CC9E5A] transition duration-300 ease-in">
                            About
                        </a>
                    </div>
               </div>
            </div>

            <hr class="mt-6 border-[#CC9E5A]">

            <div class="flex flex-col space-y-5 md:space-y-0 md:flex-row md:justify-between md:items-center mt-5 text-amber-100">
                <span class="font-montserrat font-semibold text-xs">
                    {{ config('app.name') }} &middot; All rights reserved
                </span>

                <span class="font-montserrat font-semibold text-xs">
                    &copy; 2019 - {{ date('Y') }}
                </span>

                {{-- follow us! --}}
                <!--
                <div class="flex space-x-4 items-center font-medium text-xs">
                    {{-- facebook --}}
                    <a href="#" class="transition duration-300 ease-in">
                        <svg class="w-5 h-5" viewBox="0 0 10 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <desc>Created with Sketch.</desc>
                            <defs></defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Dribbble-Dark-Preview" transform="translate(-385.000000, -7399.000000)" fill="#FFFFFF">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <path d="M335.821282,7259 L335.821282,7250 L338.553693,7250 L339,7246 L335.821282,7246 L335.821282,7244.052 C335.821282,7243.022 335.847593,7242 337.286884,7242 L338.744689,7242 L338.744689,7239.14 C338.744689,7239.097 337.492497,7239 336.225687,7239 C333.580004,7239 331.923407,7240.657 331.923407,7243.7 L331.923407,7246 L329,7246 L329,7250 L331.923407,7250 L331.923407,7259 L335.821282,7259 Z" id="facebook-[#176]"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>

                    {{-- instagram --}}
                    <a href="#" class="transition duration-300 ease-in">
                        <svg class="w-5 h-5" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <desc>Created with Sketch.</desc>
                            <defs></defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Dribbble-Dark-Preview" transform="translate(-340.000000, -7439.000000)" fill="#FFFFFF">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <path d="M289.869652,7279.12273 C288.241769,7279.19618 286.830805,7279.5942 285.691486,7280.72871 C284.548187,7281.86918 284.155147,7283.28558 284.081514,7284.89653 C284.035742,7285.90201 283.768077,7293.49818 284.544207,7295.49028 C285.067597,7296.83422 286.098457,7297.86749 287.454694,7298.39256 C288.087538,7298.63872 288.809936,7298.80547 289.869652,7298.85411 C298.730467,7299.25511 302.015089,7299.03674 303.400182,7295.49028 C303.645956,7294.859 303.815113,7294.1374 303.86188,7293.08031 C304.26686,7284.19677 303.796207,7282.27117 302.251908,7280.72871 C301.027016,7279.50685 299.5862,7278.67508 289.869652,7279.12273 M289.951245,7297.06748 C288.981083,7297.0238 288.454707,7296.86201 288.103459,7296.72603 C287.219865,7296.3826 286.556174,7295.72155 286.214876,7294.84312 C285.623823,7293.32944 285.819846,7286.14023 285.872583,7284.97693 C285.924325,7283.83745 286.155174,7282.79624 286.959165,7281.99226 C287.954203,7280.99968 289.239792,7280.51332 297.993144,7280.90837 C299.135448,7280.95998 300.179243,7281.19026 300.985224,7281.99226 C301.980262,7282.98483 302.473801,7284.28014 302.071806,7292.99991 C302.028024,7293.96767 301.865833,7294.49274 301.729513,7294.84312 C300.829003,7297.15085 298.757333,7297.47145 289.951245,7297.06748 M298.089663,7283.68956 C298.089663,7284.34665 298.623998,7284.88065 299.283709,7284.88065 C299.943419,7284.88065 300.47875,7284.34665 300.47875,7283.68956 C300.47875,7283.03248 299.943419,7282.49847 299.283709,7282.49847 C298.623998,7282.49847 298.089663,7283.03248 298.089663,7283.68956 M288.862673,7288.98792 C288.862673,7291.80286 291.150266,7294.08479 293.972194,7294.08479 C296.794123,7294.08479 299.081716,7291.80286 299.081716,7288.98792 C299.081716,7286.17298 296.794123,7283.89205 293.972194,7283.89205 C291.150266,7283.89205 288.862673,7286.17298 288.862673,7288.98792 M290.655732,7288.98792 C290.655732,7287.16159 292.140329,7285.67967 293.972194,7285.67967 C295.80406,7285.67967 297.288657,7287.16159 297.288657,7288.98792 C297.288657,7290.81525 295.80406,7292.29716 293.972194,7292.29716 C292.140329,7292.29716 290.655732,7290.81525 290.655732,7288.98792" id="instagram-[#167]"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>

                    {{-- twitter --}}
                    <a href="#" class="transition duration-300 ease-in">
                        <svg class="w-5 h-5" viewBox="0 0 20 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <desc>Created with Sketch.</desc>
                            <defs></defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Dribbble-Dark-Preview" transform="translate(-60.000000, -7521.000000)" fill="#FFFFFF">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <path d="M10.29,7377 C17.837,7377 21.965,7370.84365 21.965,7365.50546 C21.965,7365.33021 21.965,7365.15595 21.953,7364.98267 C22.756,7364.41163 23.449,7363.70276 24,7362.8915 C23.252,7363.21837 22.457,7363.433 21.644,7363.52751 C22.5,7363.02244 23.141,7362.2289 23.448,7361.2926 C22.642,7361.76321 21.761,7362.095 20.842,7362.27321 C19.288,7360.64674 16.689,7360.56798 15.036,7362.09796 C13.971,7363.08447 13.518,7364.55538 13.849,7365.95835 C10.55,7365.79492 7.476,7364.261 5.392,7361.73762 C4.303,7363.58363 4.86,7365.94457 6.663,7367.12996 C6.01,7367.11125 5.371,7366.93797 4.8,7366.62489 L4.8,7366.67608 C4.801,7368.5989 6.178,7370.2549 8.092,7370.63591 C7.488,7370.79836 6.854,7370.82199 6.24,7370.70483 C6.777,7372.35099 8.318,7373.47829 10.073,7373.51078 C8.62,7374.63513 6.825,7375.24554 4.977,7375.24358 C4.651,7375.24259 4.325,7375.22388 4,7375.18549 C5.877,7376.37088 8.06,7377 10.29,7376.99705" id="twitter-[#154]"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div> -->

                <span class="font-montserrat font-semibold text-xs">
                    @php
                        echo htmlentities('</>');
                    @endphp <a href="#">Resectra Technologies</a>
                </span>
            </div>
        </div>
    </footer>
    @endforeach
@endsection
