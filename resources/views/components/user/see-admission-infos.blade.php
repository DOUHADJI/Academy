@if(Auth::user() -> role == "student")
    <div class="mb-4" @if($admission_accepted) hidden @endif>
        
        <div class="border rounded border-warning p-2 px-5 font-bold">
            Vos choix de parcours seront étudié par notre commission d'admission des étudiants. 
            Une réponse vous envoyée pour vous notifier de la décision de la comission. 

            Bonne chance !
        </div>
    </div>
@endif

<div>
    <div class="elevation-2 p-12 ">
        <p class="font-bold text-lg px-8 pt-8">Choix de parcours</p>
        <hr class="my-8" />

        <div class="grid gap-6 md:grid-cols-3">
            @foreach ($admissions as $k => $admission)
                <x-layout.partials.schedule-info-box 
                :title="$k + 1" 
                :admission="$admission" />
            @endforeach
        </div>

    </div>
</div>


