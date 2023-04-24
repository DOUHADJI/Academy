
@aware(['admission'])

<div class="grid gap-6">
    <div class="elevation-2 p-12 bg-white">
        <div class="px-8 py-6 text-gray-600">

            <h2 class=" text-3xl font-bold  mb-8">
                Informations générales
            </h2>
            <hr class="my-6" />

            <div class=" w-full">
                <div class="flex justify-between items-center my-4 w-full pl-8 ">
                    <img src="{{ Storage::url($student->avatar) }}" alt="avatar" class="object-cover h-44 w-32 " />
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
                                <span class="tracking-widest">{{ $student->nom }}</span>
                            </p>
                        </div>

                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Prenom:</span>
                                <span class="tracking-widest">{{ $student->prenom }}</span>
                            </p>
                        </div>

                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Date de naissance:</span>
                                <span class="tracking-widest">{{ $student->date_naissance }}</span>
                            </p>
                        </div>

                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Lieu de naissance:</span>
                                <span class="tracking-widest">{{ $student->lieu_naissance }}</span>
                            </p>
                        </div>

                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Pays de naissance:</span>
                                <span class="tracking-widest">{{ $student->pays_naissance }}</span>
                            </p>
                        </div>
                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Nationalité:</span>
                                <span class="tracking-widest">{{ $student->nationalite }}</span>
                            </p>
                        </div>
                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Sexe:</span>
                                <span class="tracking-widest">{{ $student->sexe }}</span>
                            </p>
                        </div>
                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Situation de famille:</span>
                                <span class="tracking-widest">{{ $student->situation_famille }}</span>
                            </p>
                        </div>

                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Nom de jeune fille:</span>
                                <span class="tracking-widest">{{ $student->nom_jeune_fille }}</span>
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
                                <span class="tracking-widest">{{ $student->student->email }}</span>
                            </p>
                        </div>

                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Adresse:</span>
                                <span class="tracking-widest">{{ $student->adresse }}</span>
                            </p>
                        </div>

                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Ville:</span>
                                <span class="tracking-widest">{{ $student->ville }}</span>
                            </p>
                        </div>

                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Quartier:</span>
                                <span class="tracking-widest">{{ $student->quartier }}</span>
                            </p>
                        </div>

                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Numéro de téléphone:</span>
                                <span class="tracking-widest">{{ $student->telephone }}</span>
                            </p>
                        </div>

                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Boite postal:</span>
                                <span class="tracking-widest">{{ $student->boite_postal }}</span>
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
                                <span class="tracking-widest">{{ $student->annee_bac }}</span>
                            </p>
                        </div>

                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Mention au Bac:</span>
                                <span class="tracking-widest">{{ $student->mention_bac }}</span>
                            </p>
                        </div>

                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Date de naissance:</span>
                                <span class="tracking-widest">{{ $student->date_naissance }}</span>
                            </p>
                        </div>

                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold"> Série du Bac:</span>
                                <span class="tracking-widest">{{ $student->serie_bac }}</span>
                            </p>
                        </div>

                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Pays de naissance:</span>
                                <span class="tracking-widest">{{ $student->pays_naissance }}</span>
                            </p>
                        </div>
                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Numéro de table au BAC:</span>
                                <span class="tracking-widest">{{ $student->num_table_bac }}</span>
                            </p>
                        </div>
                        <div class="pl-6">
                            <p class="">
                                <span class="mr-2 underline  text-gray-500 font-bold">Grade démandé:</span>
                                <span class="tracking-widest">{{ $student->grade }}</span>
                            </p>
                        </div>



                    </div>
                </div>
            </div>

            <hr class="my-6" />

            @if(Auth::user() -> role =="student")
            <div class="flex w-full justify-end">
                <a href="{{ route('updateStudent') }}" class="py-3 px-8 bg-purple-500 text-white hover:bg-purple-400">
                    informations</a>
            </div>
            @endif

        </div>
    </div>

</div>
