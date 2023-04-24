<div class="elevation-2 p-12 bg-white">

    <div class="border">

        <div class=" ">
            <div class="flex justify-around items-center py-2">
                <div>
                    <p class="font-bold text-lg text-center">
                        <i class="fa fa-file-alt mr-2"></i>
                        Fiche d'Unités d'enseignement
                    </p>
                </div>
                <img src="{{ asset('images/GU-logo.webp') }}" alt="logo université" class="object-fit h-16">
                <div>
                    <p class="  text-center">
                        <span class="font-bold">
                            <i class="fa fa-calendar-alt mr-2"></i>
                            Année acémique :
                        </span>
                        @php
                        $_start = new DateTime($payment->school_year->start);
                        $_end = new DateTime($payment->school_year->end);
                        $start = $_start->format('Y');
                        $end = $_end->format('Y');
                        @endphp
                        {{ $start }} - {{ $end }}
                    </p>
                </div>
            </div>
            <hr class="mt-2 mb-8" />

            <div>
                <div class="px-8 py-6 text-gray-600">
                    <div class=" w-full">
                        <div class="flex justify-between items-center my-4 w-full pl-8 ">
                            <img src="{{ Storage::url($payment->student->infos->avatar) }}" alt="avatar" class="object-cover h-44 w-32 " />
                            @if(Auth::user() -> role == "admin")
                            <div class="text-center pr-12">
                                @if($admission -> status == "accepted")
                                <i class="fa fa-check-circle text-5xl text-green-500"></i>
                                @elseif ($admission -> status == "refused")
                                <i class="fa fa-times-circle text-5xl text-red-500"></i>
                                @endif
                            </div>
                            @endif
                        </div>

                    </div>

                    <div class="grid border-y border-l md:grid-cols-3">
                        <div class="border-r h-full col-span-2">
                            <p class="text-gray-700 text-lg py-2 border-b font-bold text-center">
                                <i class="fa fa-user text-lg"></i>
                                Identité
                            </p>
                            <div class="flex flex-wrap gap-4 p-4">
                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Nom:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->nom }}</span>
                                    </p>
                                </div>

                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Prenom:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->prenom }}</span>
                                    </p>
                                </div>

                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Date de naissance:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->date_naissance }}</span>
                                    </p>
                                </div>

                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Lieu de naissance:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->lieu_naissance }}</span>
                                    </p>
                                </div>

                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Pays de naissance:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->pays_naissance }}</span>
                                    </p>
                                </div>
                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Nationalité:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->nationalite }}</span>
                                    </p>
                                </div>
                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Sexe:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->sexe }}</span>
                                    </p>
                                </div>
                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Situation de famille:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->situation_famille }}</span>
                                    </p>
                                </div>

                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Nom de jeune fille:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->nom_jeune_fille }}</span>
                                    </p>
                                </div>


                            </div>
                        </div>

                        <div class="border-r h-full">
                            <p class="text-gray-700 text-lg py-2 border-b font-bold text-center">
                                <i class="fa fa-address-card text-lg"></i>
                                Adresse
                            </p>
                            <div class="flex flex-wrap gap-4 p-4">
                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Email:</span>
                                        <span class="tracking-widest">{{ $payment->student->email }}</span>
                                    </p>
                                </div>

                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Adresse:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->adresse }}</span>
                                    </p>
                                </div>

                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Ville:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->ville }}</span>
                                    </p>
                                </div>

                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Quartier:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->quartier }}</span>
                                    </p>
                                </div>

                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Numéro de téléphone:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->telephone }}</span>
                                    </p>
                                </div>

                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Boite postal:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->boite_postal }}</span>
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="border-r border-t col-span-3 h-full">
                            <p class="text-gray-700 text-lg py-2 text-center border-b w-full font-bold">
                                <i class="fa fa-graduation-cap text-lg"></i>
                                Scolarité
                            </p>

                            <div class="flex flex-wrap gap-4 p-4">
                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Année du Bac:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->annee_bac }}</span>
                                    </p>
                                </div>

                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Mention au Bac:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->mention_bac }}</span>
                                    </p>
                                </div>

                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Date de naissance:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->date_naissance }}</span>
                                    </p>
                                </div>

                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold"> Série du Bac:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->serie_bac }}</span>
                                    </p>
                                </div>

                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Pays de naissance:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->pays_naissance }}</span>
                                    </p>
                                </div>
                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Numéro de table au BAC:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->num_table_bac }}</span>
                                    </p>
                                </div>
                                <div class="pl-6">
                                    <p class="">
                                        <span class="mr-2 underline  text-gray-500 font-bold">Grade démandé:</span>
                                        <span class="tracking-widest">{{ $payment->student->infos->grade }}</span>
                                    </p>
                                </div>



                            </div>
                        </div>
                    </div>

                    <hr class="my-6" />

                    @if(Auth::user() -> role =="payment->student->infos")
                    <div class="flex w-full justify-end">
                        <a href="{{ route('updateStudent') }}" class="py-3 px-8 bg-purple-500 text-white hover:bg-purple-400">
                            informations</a>
                    </div>
                    @endif

                </div>
            </div>

            <hr class="my-6" />
            <div>
                <p>  
                    <span class="font-bold mr-2">Parcours</span>
                    {{-- <span>{{ $payment->schedule->titre_diplome }}</span> --}}
                </p>
            </div>
            <hr/>
            <div>
                <p class="font-bold text-center text-lg">
                    Unité d'enseignements
                </p>
            </div>
            <hr class="my-6" />

            <div class="px-12">
                @php
                $headers = ['Code', 'Intitulé', 'Crédit', 'Nature', 'Sem. Acad'];
                @endphp

                <x-layout.partials.table-with-filter table-id="inscriptionsTable">

                    <x-slot:headers>

                        @foreach ($headers as $header)
                        <x-layout.partials.sortable-th :title="$header" />
                        @endforeach
                    </x-slot:headers>
                    <x-slot:body>
                        @foreach ($payment->inscriptions as $inscription)
                        <tr role="row" class="odd">
                            <td>
                                {{ $inscription->offer->code }}
                            </td>
                            <td>
                                {{ $inscription->offer->intitule }}
                            </td>
                            <td>
                                {{ $inscription->offer->credit }}
                            </td>
                            <td>
                                {{ $inscription->offer->nature }}
                            </td>
                            <td>
                                {{ $inscription->offer->semestre_academique }}
                            </td>
                            
                        </tr>
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
                            @foreach ($payment->inscriptions as $inscription)
                            {{-- @if ($offer->semestre == $i + 1) --}}
                            @php
                            $sum[] = $inscription->offer->credit;
                            @endphp
                            {{-- @endif --}}
                            @endforeach
                            @php
                            $total = array_sum($sum);
                            @endphp
                            {{ $total }}
                        </th>
                        <th></th>
                        <th></th>
                        
                    </tr>

                </x-layout.partials.table-with-filter>
            </div>


        </div>

    </div>
</div>

<div class="flex mt-8 px-8 justify-end">
    <button class="btn btn-primary">
        <i class="fa fa-print"></i>
        imprimer
    </button>

</div>
