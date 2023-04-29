<div class="">
    <div class="flex justify-between items-center border-b pb-6">
        {{-- <img src="{{ asset('images/GU-logo.webp') }}" 
        alt="logo université" class="object-fit h-16"> --}}
        <div>
            <p class="  text-center">
                <span class="font-bold">
                    <i class="fa fa-calendar-alt mr-2"></i>
                    Année acémique :
                </span>
                @php
                $_start = new DateTime($schoolYear->start);
                $_end = new DateTime($schoolYear->end);
                $start = $_start->format('Y');
                $end = $_end->format('Y');
                @endphp
                {{ $start }} - {{ $end }}
            </p>
        </div>
    </div>

    <div class="font-bold my-8 text-lg">
        <p class="underline uppercase text-center">
            {{ $title }}
        </p>
    </div>
</div>
