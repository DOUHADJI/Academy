<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title font-bold">Modifier le cours - {{ $offer->code }} ({{ $offer->intitule }})</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('updateOffer', $school->sigle) }}" method="POST"
            class="grid mt-8 gap-4 px-12 md:grid-cols-3 lg:grid-cols-4" id="updateOfferForm">
            @csrf
            <x-layout.partials.simple-input name="code" label="Code" placeholder="code" type="text"
                required="true" />

            <div class="w-full col-span-2">
                <x-layout.partials.simple-input name="intitule" label="Intitulé" placeholder="intitule" type="text"
                    required="true" />
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
                    <select name="semestre"
                        class="form-control @error('semestre') is-invalid @enderror">
                        <option value="">Choisir</option>
                        @for ($i = 0; $i < $schedule->nbr_semestres; $i++)
                            <option value="{{ $i + 1 }}"
                                @if ($offer !== null && $offer->semestre == $i + 1) selected @else @selected(old('semestre')) @endif>
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

            

            <input type="text" name="grade" value="{{ $schedule->grade }}" hidden>
            <input type="text" name="schedule_id" value="{{ $schedule->id }}" hidden>
            <input type="text" name="id" value="{{ $offer->id }}" hidden>



        </form>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <div class="flex justify-between w-full ">
            <div>
                <form
                action="{{ route('deleteOffer', [
                    'school' => $school->sigle,
                    'id_parcours' => $schedule->id,
                ]) }}"
                class="flex w-full justify-end h-full " method="POST">
                @csrf
                <input type="text" value="{{ $offer->id }}" name="offer_id" hidden>

                <button class="btn btn-danger btn-lg">
                    Supprimer
                </button>

            </form>
            </div>

            <button form="updateOfferForm" class="btn btn-lg btn-primary">
                Enregistrer
            </button>
        </div>
    </div>
</div>



<!-- Formulaired'ajout d'une nouvelle UE  DEBUT -->
