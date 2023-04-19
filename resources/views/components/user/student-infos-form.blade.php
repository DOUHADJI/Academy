@aware(['user'])

@php
    $student = $object();
@endphp

<div class="bg-gray-100 px-8 py-6 bg-white">
   
    <h2 class=" text-3xl font-bold text-gray-400 mb-16">
        @if ($disabled == 'true')
            Informations générales
        @else
            @error('infos')
                {{ $message }}
            @else
                Mettre mes informations à jour
            @enderror
        @endif
    </h2>
    <hr class="my-6" />
    <div class=" w-full" @if ($disabled == 'false') hidden @endif>
        <div class="flex justify-center w-full ">
            @if (isset($student))
                <img src="@if ($disabled == 'true') {{ Storage::url($student->avatar) }} @endif" alt="avatar"
                    class="border-4 border-gray-400 rounded-full object-cover h-56 w-52" />
            @endif
        </div>
       {{--  <p class=" text-lg font-bold text-gray-400 mb-16 text-center">
            Photo de profil
        </p> --}}
    </div>
    
    <form id="studentInfos" action="{{ route('storeStudent') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="mb-24">

            <p class="text-blue-700 text-3xl">
                Identité
            </p>
            <hr class="my-4" />
            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3">
                <div class="" @if ($disabled == 'true') hidden @endif>
                    <div class="form-group">
                        <label for="avatar"
                            class=" text-lg @error('avatar') text-red-400 @else text-gray-500 @enderror">
                            <p class="font-bold mb-2">
                                Photo de profil *
                            </p>
                        </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="avatar"placeholder="photo de profil">
                            <label class="custom-file-label" for="customFile">ajouter une photo</label>
                        </div>
                    </div>

                    
                </div>
                <x-layout.partials.simple-input name="nom" placeholder=" nom de famille" type="text"
                    label="Nom" required="true" />
                <x-layout.partials.simple-input name="prenom" placeholder="Prénom(s)" type="text" label="Prénom(s)"
                    required="true" />
                <x-layout.partials.simple-input name="lieu_naissance" placeholder="Lieu de naissance" type="text"
                    label="Lieu de naissance" required="true" />
                <x-layout.partials.simple-input name="date_naissance" placeholder="Date de naissance" type="date"
                    label="Date de naissance" required="true" />
                <x-layout.partials.user.countries name="pays_naissance" placeholder="pays de naissance"
                    label="Pays de naissance" required="true" />
                <x-layout.partials.user.nationalities />

                @php
                    $sexe = ['Masculin', 'Féminin'];
                @endphp
                <x-layout.partials.select name="sexe" placeholder="sexe" :options="$sexe" label="Sexe"
                    required="true" />

                @php
                    $situation = ['Célibataire', 'Concubin(e)', 'Marié(e)', 'Divorcé(e)', 'Veuf(ve)'];
                @endphp
                <x-layout.partials.select name="situation_famille" placeholder="situation de famille" :options="$situation"
                    label="Situation de famille" required="true" />

                <x-layout.partials.simple-input name="nom_jeune_fille" placeholder="Nom de jeune fille" type="text"
                    label="Nom de jeune fille" required="false" />

            </div>
        </section>

        <section class="mb-24">
            <p class="text-blue-700 text-3xl">
                Adresse
            </p>
            <hr class="my-4" />
            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3">
                <x-layout.partials.simple-input name="email" placeholder="{{ $user->email }}" type="text"
                    label="Email" required="false" />
                <x-layout.partials.simple-input name="adresse" placeholder="adresse" type="text" label="Adresse"
                    required="true" />
                <x-layout.partials.simple-input name="boite_postal" placeholder="boite postal" type="text"
                    label="Boite postal" required="false" />
                <x-layout.partials.simple-input name="ville" placeholder="ville" type="text" label="Ville"
                    required="true" />
                <x-layout.partials.simple-input name="quartier" placeholder="quartier" type="text" label="Quartier"
                    required="true" />
                <x-layout.partials.simple-input name="telephone" placeholder="numéro de téléphone" type="number"
                    label="Numéro de téléphone" required="true" />

            </div>
        </section>

        <section class="mb-24">
            <p class="text-blue-700 text-3xl">
                Scolarité
            </p>
            <hr class="my-4" />
            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3">

                @php
                    $date = new DateTime();
                    $start_year = $date->format('Y') - 1;
                    $end_year = 1979;
                    $interval = $start_year - $end_year;
                    $years = [];
                    for ($i = 0; $i < $interval; $i++) {
                        $years[] = $start_year - $i;
                    }
                    
                @endphp
                <x-layout.partials.select name="annee_bac" placeholder="année de bac" :options="$years"
                    label="Année du BAC" required="true" />

                @php
                    $mentions = ['Excellent', 'Très Bien', 'Bien', 'Assez Bien', 'Passable'];
                @endphp
                <x-layout.partials.select name="mention_bac" placeholder="mention" :options="$mentions"
                    label="Mention au Bac" required="true" />

                <x-layout.partials.user.series />
                <x-layout.partials.user.countries name="pays_bac" placeholder="pays du BAC" label="Pays du BAC"
                    required="true" />

                <x-layout.partials.simple-input name="num_table_bac" type="number"
                    placeholder="numéro de table au BAC" label="Numéro de table au BAC" required="true" />

                @php
                    $grade = ['Licence', 'Master', 'Doctorat'];
                @endphp
                <x-layout.partials.select name="grade" placeholder="grade" :options="$grade" label="Grade demandé"
                    required="true" />

            </div>
        </section>
    </form>

    <hr class="my-6" />

    @if ($disabled == 'true')
        <div class="flex w-full justify-end">
            <a href="{{ route('updateStudent') }}"
                class="py-3 px-8 bg-purple-500 text-white hover:bg-purple-400">Modifier mes
                informations</a>
        </div>
    @endif

    <div class="flex flex-wrap justify-end gap-8 mb-12 @if ($disabled == 'true') hidden @endif">
        <a href="{{ route('showStudent') }}"
            class="btn btn-default">
            annuler
        </a>
        <button  form="studentInfos"
            class="btn btn-success ">
            enregistrer
        </button>
    </div>

</div>
