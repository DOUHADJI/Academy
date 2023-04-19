<div>
    <!-- Formulaire d'ajout d'un nouveau parcours au sein d'une école DEBUT -->
    <div class="mt-8">
        <p class="text-blue-500 text-lg pl-8 mb-2 font-bold">
            Ajouter un nouveau parcours
        </p>
        <hr class="mb-8" />
        <form action="{{ route('createSchedule', ['school' => $school->sigle]) }}" method="POST" id="newScheduleForm"
            class="grid gap-12 px-8 py-6 bg-white mx-6 sm:grid-cols-2 md:grid-cols-6">
            @csrf
            <div class="w-full col-span-2">
                <x-layout.partials.simple-input name="domaine" label="Mention" placeholder="mention" type="text"
                    required="true" />
            </div>

            <div class="w-full col-span-2 ">
                <x-layout.partials.simple-input name="titre_diplome" label="Spécialité" placeholder="Spécialité"
                    type="text" required="true" />
            </div>

            <x-layout.partials.simple-input name="nbr_semestres" label="Nbrs semestres" placeholder="semestre"
                type="number" required="true" />
            @php
                $options = ['Licence', 'Master', 'Doctorat'];
            @endphp
            <x-layout.partials.select name="grade" label="Grade" placeholder="grade" :options="$options"
                required="true" />
            <input hidden name="school_id" value="{{ $school->id }}" />
        </form>

        <div class="flex justify-end pr-8 mt-4">
            <button form="newScheduleForm" class="btn btn-primary btn-lg">
                Valider
            </button>
        </div>

        <hr class="mt-8 mb-6" />
    </div>
    <!-- Formulaire d'ajout d'un nouveau parcours au sein d'une école FIN -->

    <!-- Les différents parcours disponibles  DEBUT -->

    <p class="text-xl font-bold text-gray-500 mt-12 mb-8 pl-8">
        Liste des parcours ouverts à {{ $school->sigle }} ({{ $school->grades_disponibles }})
    </p>

    <div class="flex flex-wrap gap-4 px-8">
        @foreach ($schedules as $schedule)
            <a
                href="{{ route('showSchool', [
                    'school' => $school->sigle,
                    'id_parcours' => $schedule->id,
                    'grade' => $schedule->grade,
                ]) }}">
                <div
                    class="border-2 border-gray-500 px-4 py-2 w-fit h-full text-gray-600 
                @if ($schedule ->id == $selected) border-blue-500 bg-white  @endif">

                    <p>
                        <span class="fa fa-graduation-cap"></span>
                        {{ $schedule->titre_diplome }}

                    </p>

                </div>
            </a>
        @endforeach
    </div>

    <!-- Les différents parcours disponibles  FIN -->



    <!-- Listes des UEs Du parcours  DEBUT -->

    @foreach ($schedules as $schedule)
        <div class="mx-8 mt-12 px-8 py-8 bg-white mt- " @if ($selected != $schedule->id) hidden @endif>
            <p class="text-blue-500 font-bold text-lg mb-4">
                {{ $schedule->titre_diplome }}
            </p>
            <hr />
            <!-- Formulaired'ajout d'une nouvelle UE  DEBUT -->
            <div class="mt-8">
                <form action="{{ route('createOffer', $school->sigle) }}" method="POST"
                    class="grid mt-8 gap-4 md:grid-cols-3 lg:grid-cols-4">
                    @csrf
                    <x-layout.partials.simple-input name="code" label="Code" placeholder="code" type="text"
                        required="true" />

                    <div class="w-full col-span-2">
                        <x-layout.partials.simple-input name="intitule" label="Intitulé" placeholder="intitule"
                            type="text" required="true" />
                    </div>

                    <x-layout.partials.simple-input name="credit" label="Crédit" placeholder="credit" type="number"
                        required="true" />

                    @php
                        $options = ['Fondamentale', 'Complémentaire', 'Transversale', 'Spécialité', 'Approfondissement', 'UE Libre'];
                        
                        $sems = ['HARMATTAN', 'MOUSSON'];
                        
                    @endphp

                    <x-layout.partials.select name="nature" label="Nature" placeholder="nature" :options="$options"
                        required="true" />
                    <x-layout.partials.select name="semestre_academique" label="Sem. Acad" placeholder="semestre acad"
                        :options="$sems" required="true" />


                    <div class="form-group">
                        <label for="semestre" class="text-lg">
                            <p class="font-bold mb-2 @error('semestre') text-red-400 @else text-gray-500 @enderror">
                                Semestre *
                            </p>
                        </label>
                        <select name="semestre" class="form-control @error('semestre') is-invalid @enderror">
                            <option value="">Choisir</option>
                            @for ($i = 0; $i < $schedule->nbr_semestres; $i++)
                                <option value="{{ $i + 1 }}" @selected(old('semestre') == $i + 1)>
                                    SEMESTRE {{ $i + 1 }}
                                </option>
                            @endfor
                        </select>
                        @error('semestre')
                            <p class="mb-2 text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>




                    <input type="text" name="offer_grade" value="{{ $schedule->grade }}" hidden>
                    <input type="text" name="schedule_id" value="{{ $schedule->id }}" hidden>

                    <div class="flex items-end h-full md:col-span-3 lg:col-span-4">
                        <button type="null" class="btn btn-primary w-full btn-lg">
                            Ajouter une matière
                        </button>
                    </div>

                </form>
            </div>
            <!-- Formulaired'ajout d'une nouvelle UE  DEBUT -->

            <!-- Liste des UEs par semestre  DEBUT -->

            <div class="mt-12  rounded-t-lg border border-slate-400 h-full">
                <p class="font-black text-lg text-gray-600 px-8 py-4 bg-[#F5F5F6]  border-b border-slate-400">
                    Liste des unités d'enseignements obligatoires et optionnelles
                </p>
                @for ($i = 0; $i < $schedule->nbr_semestres; $i++)
                    <div class="p-12">
                        <table class="w-full py-4">
                            @php
                                $headers = ['Code', 'Intitulé', 'Crédit', 'Nature', 'Sem. Acad'];
                            @endphp
                            <thead>
                                <tr class="border">
                                    <p class="text-center bg-blue-300 py-3 font-bold text-lg uppercase text-gray-600 ">
                                        semestre {{ $i + 1 }}
                                    </p>
                                </tr>
                                <tr class=" bg-[#F5F5F6] py-2 px-4 ">
                                    @foreach ($headers as $header)
                                        <th class=" text-start  text-gray-400 px-6 py-2 border-x ">
                                            {{ $header }}
                                        </th>
                                    @endforeach
                                    <th class=" text-start  text-gray-400 px-6 py-2 border-x ">
                                        {{ null }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $bool = false;
                                @endphp
                                @foreach ($offers as $offer)
                                    @if ($offer->semestre == $i + 1)
                                        <x-layout.partials.admin.updatable-tr :offer="$offer" :schedule="$schedule"
                                            :toUpdate="false" />
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="w-full my-3 bg-blue-300 text-gray-500 font-bold uppercase border">
                                    <th></th>
                                    <th class="w-full my-3 text-center">
                                        Total
                                    </th>
                                    <th class=" w-fullmy-3 text-center">
                                        @php
                                            $sum = [];
                                        @endphp
                                        @foreach ($offers as $offer)
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
                            </tfoot>
                        </table>
                    </div>
                @endfor
            </div>

            <script>
                const getId = () => {

                    let offer = Document.activeElement.id
                    alert(JSON.stringify(offer))

                }

                const trId = offer.id
                const updateId = trId + "_update"
            </script>

            <!-- Liste des UEs par semestre  DEBUT -->



        </div>
    @endforeach

    <!-- Listes des UEs du parcours  FIN -->
</div>
