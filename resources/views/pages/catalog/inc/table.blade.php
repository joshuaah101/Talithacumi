@foreach ($catalogues as $catalog)
<div class="flex flex-col md:flex-row gap-5 shadow-lg px-2 bg-white py-2 rounded-lg w-full md:w-[32%]">
    <div class="flex w-full md:w-[35%] items-center justify-center md:justify-start">
        <a href="{{ asset('storage/img/jpg/table/'.$catalog->img_name.'.'.$catalog->img_ext ) }}" class="hover:scale-105 transition duration-300 ease-in" target="_blank">
            <div class="w-[100%] h-40 rounded-md">
                <img src="{{ asset('storage/img/jpg/table/'.$catalog->img_name.'.'.$catalog->img_ext ) }}" alt="picture" class="h-full w-full rounded-[100%]">
            </div>
        </a>
    </div>
    <div class="flex flex-col gap-1 py-2 space-y-1 w-full md:w-[65%] my-auto items-center justify-center md:justify-start md:items-start">
        <div class="flex flex-col">
            <span class="text-amber-900 font-extralight font-poppins text-lg">
                {{ ucfirst($catalog->product_name) }}
            </span>
            <span class="text-amber-900 font-normal font-poppins text-sm">
               #{{ number_format($catalog->price, 0, '.', ',') }}
            </span>
        </div>

        @if(!empty($catalog->description))
            <div class="flex flex-col space-y-1">
                <header class="text-xs">
                    Description:
                </header>
                <span class="text-[10px]">
                    {{ $catalog->description }}
                </span>
            </div>
        @endif

        <div class="flex space-x-1 items-center">
            <header>
                Contact us via:
            </header>
            @foreach($contacts as $contact)
            <div class="flex flex-wrap gap-2">
                <a href="https://wa.me/{{ $contact->whatsapp }}?text=Hello%20good%20day,%0A%0AI%20will%20like%20to%20enquire%20about%20this%20*{{ $catalog->product_name }}* %0AWith the image link below %0A {{ asset('storage/img/jpg/table/'.$catalog->img_name.'.'.$catalog->img_ext ) }}" class="px-2 py-1 hover:scale-125 hover:border-green-700 transition duration-300 ease-in text-xs text-green-600 rounded flex justify-center items-center" target="_blank">
                    <svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 3.8.1 (29687) - http://www.bohemiancoding.com/sketch -->
                        <title>whatsapp [#128]</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Dribbble-Dark-Preview" transform="translate(-300.000000, -7599.000000)" fill="#18FF94">
                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                    <path d="M259.821,7453.12124 C259.58,7453.80344 258.622,7454.36761 257.858,7454.53266 C257.335,7454.64369 256.653,7454.73172 254.355,7453.77943 C251.774,7452.71011 248.19,7448.90097 248.19,7446.36621 C248.19,7445.07582 248.934,7443.57337 250.235,7443.57337 C250.861,7443.57337 250.999,7443.58538 251.205,7444.07952 C251.446,7444.6617 252.034,7446.09613 252.104,7446.24317 C252.393,7446.84635 251.81,7447.19946 251.387,7447.72462 C251.252,7447.88266 251.099,7448.05372 251.27,7448.3478 C251.44,7448.63589 252.028,7449.59418 252.892,7450.36341 C254.008,7451.35771 254.913,7451.6748 255.237,7451.80984 C255.478,7451.90987 255.766,7451.88687 255.942,7451.69881 C256.165,7451.45774 256.442,7451.05762 256.724,7450.6635 C256.923,7450.38141 257.176,7450.3464 257.441,7450.44643 C257.62,7450.50845 259.895,7451.56477 259.991,7451.73382 C260.062,7451.85686 260.062,7452.43903 259.821,7453.12124 M254.002,7439 L253.997,7439 L253.997,7439 C248.484,7439 244,7443.48535 244,7449 C244,7451.18666 244.705,7453.21526 245.904,7454.86076 L244.658,7458.57687 L248.501,7457.3485 C250.082,7458.39482 251.969,7459 254.002,7459 C259.515,7459 264,7454.51465 264,7449 C264,7443.48535 259.515,7439 254.002,7439" id="whatsapp-[#128]"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>

                <a href="tel:+{{ $contact->phone_number }}" class="px-2 py-1 hover:scale-125 hover:border-blue-700 transition duration-300 ease-in text-xs text-blue-600 rounded flex justify-center items-center" target="_blank">
                    <span class="material-icons-outlined">
                        phone
                    </span>
                </a>

                <a href="mailto:{{ $contact->email }}" class="px-2 py-1 hover:scale-125 hover:border-red-700 transition duration-300 ease-in text-xs text-red-600 rounded flex justify-center items-center" target="_blank">
                    <span class="material-icons-outlined">
                        alternate_email
                    </span>
                </a>
            </div>
            @endforeach
        </div>
   </div>
</div>
@endforeach
