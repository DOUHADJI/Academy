<div class="mb-4">
    <div class="border rounded border-warning p-2 px-5 font-bold">
        Vos choix de parcours seront étudié par notre commission d'admission des étudiants. 
        Une réponse vous envoyée pour vous notifier de la décision de la comission. 

        Bonne chance !
    </div>
</div>

<div>
    <div class="elevation-2 p-12 ">
        <p class="font-bold text-lg px-8 pt-8">Resume de votre admission</p>
        <hr class="my-8" />

        <div class="grid gap-6 md:grid-cols-3">
            @foreach ($admissions as $k => $admission)
                <x-layout.partials.schedule-info-box 
                :title="$k + 1" 
                :schedule="$admission -> schedule" />
            @endforeach
        </div>


        {{-- <a href="{{ route('seeCV') }}"class="btn btn-navy" target="blank">Votre cv</a> --}}


        {{-- <button form="infosForm" class="btn btn-success btn-lg">
            Modifier
        </button> --}}
    </div>
</div>


