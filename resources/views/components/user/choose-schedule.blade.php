<div>
    @if($studentChooseSchedule=="non")
    <div class="animate-bounce delay-500 border px-6 py-2 border-warning rounded mb-4">
        <p class="font-bold">
            <i class="fa fa-user"></i>
            "Vous devez choisir un parcours parmis vos choix d'inscriptions
            acceptés. Vous pourrez ensuite vous inscrire dans les unités d'enseignement
            de ce parcours".
        </p>
    </div>
    @endif
    <div class="elevation-2 p-12">
        <p class="font-bold text-lg">
            @if($studentChooseSchedule=="non")
            S'inscrire dans un parcours
            @else
            S'inscrire dans les unités d'enseignement

            @endif
        </p>
        <hr class="my-8" />

        @if($studentChooseSchedule == "non")
        <div class="grid text-black">
            @foreach ($admissions as $admission )
            <div class="flex flex-wrap justify-around gap-2 py-6 border border-secondary rounded mb-3">
                <div class="p-3">
                    <i class="fa fa-graduation-cap text-5xl"></i>
                </div>
                <div class="flex flex-col justify-center pl-8 ">
                    <p>
                        <span class="font-bold">Parcours :</span>
                        <span>{{ $admission->schedule->titre_diplome }}</span>
                    </p>
                    <p>
                        <span class="font-bold">Ecole :</span>
                        <span>{{ $admission->schedule->school->nom }}</span>
                    </p>
                    <p>
                        <span class="font-bold">Nombre de semestres :</span>
                        <span>{{ $admission->schedule->nbr_semestres }}</span>
                    </p>
                </div>
                <div class="h-full">
                    <form action="{{ route('chooseSchedule') }}" class="flex items-center justify-center" method="POST">
                        @csrf
                        <input type="text" name="choice" value="{{  $admission->schedule->id }}" hidden>
                        <button class="btn btn-success btn-lg">
                            S'inscrire
                        </button>
                    </form>
                </div>
            </div>

            @endforeach
        </div>
        @endif

        @if($studentChooseSchedule == "oui")
        <div>
            <div class="border-2 border-gray-500 px-4 py-2 w-fit h-full text-gray-600 
                 border-blue-500 bg-white  ">
                <p>
                    <span class="fa fa-graduation-cap"></span>
                    {{ $inscription->schedule->titre_diplome }}
                </p>

            </div>
            <div>
                <form action="{{ route('chooseSchedule') }}" method="POST">
                    @csrf
                    <input type="text" name="inscription_id" value='{{ $inscription->id }}' hidden>
                    <div class="mt-12  rounded-t-lg border border-slate-400 h-full">
                        <p class="font-black text-lg text-gray-600 px-8 py-4 bg-[#F5F5F6]  border-b border-slate-400">
                            Liste des unités d'enseignements obligatoires et optionnelles
                        </p>
                        @php
                        $headers = ['Code', 'Intitulé', 'Crédit', 'Nature', 'Sem. Acad',''];
                        @endphp
                        @for ($i = 0; $i < $inscription->schedule->nbr_semestres; $i++)
                            <div class="p-12">
                                <x-layout.partials.table-with-filter table-id="inscriptionsTable">

                                    <x-slot:headers>
                                        <tr class="border">
                                            <p class="text-center bg-blue-300 py-3 font-bold text-lg uppercase text-gray-600 ">
                                                semestre {{ $i + 1 }}
                                            </p>
                                        </tr>
                                        @foreach ($headers as $header)
                                        <x-layout.partials.sortable-th :title="$header" />
                                        @endforeach
                                    </x-slot:headers>
                                    <x-slot:body>
                                        @foreach ($inscription->schedule->offers as $offer)
                                        @if ($offer->semestre == $i + 1)
                                        <tr role="row" class="odd">
                                            <td>
                                                {{ $offer->code }}
                                            </td>
                                            <td>
                                                {{ $offer->intitule }}
                                            </td>
                                            <td>
                                                {{ $offer->credit }}
                                            </td>
                                            <td>
                                                {{ $offer->nature }}
                                            </td>
                                            <td>
                                                {{ $offer->semestre_academique }}
                                            </td>
                                            <td>
                                                <div class="px-4">
                                                    <input class="form-control" name="{{ $offer->id }}" type="checkbox" value="{{ $offer->id }}">
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach

                                    </x-slot:body>

                                    <tr class="w-full my-3 bg-blue-300 text-gray-500 font-bold uppercase border">
                                        <th></th>
                                        <th class="w-full my-3 text-center">
                                            Total
                                        </th>
                                        <th class=" w-full my-3 text-center">
                                            @php
                                            $sum = [];
                                            @endphp
                                            @foreach ($inscription->schedule->offers as $offer)
                                            @if ($offer->semestre == $i + 1)
                                            @php
                                            $sum[] = $offer->credit;
                                            @endphp
                                            @endif
                                            @endforeach
                                            @php
                                            $total = array_sum($sum);
                                            @endphp

                                            {{ $total }}
                                        </th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>

                                </x-layout.partials.table-with-filter>

                            </div>
                            @endfor
                    </div>
                    <div class="flex justify-end p-8">
                        <button class="btn btn-lg btn-success">
                            Valider mes choix
                        </button>
                    </div>
                </form>
            </div>


        </div>
        @endif
    </div>
</div>
