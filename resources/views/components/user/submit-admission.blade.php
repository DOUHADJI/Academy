@php
    $headers = ['Parcours - (ecole)', 'Choix'];
    $h = null;
@endphp

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <div class="callout callout-success">
        <h5>Admissions</h5>

        <p>
            Vous devez choisir trois parcours
            dans lesquels nous étudierons votre candidature.
            Vous ne pourrez être admis que dans un seul parcours dans
            lequel l'équipe d'admission vous aura jugé de vous inscrire.
        </p>
    </div>
</div>

<form action="{{ route('storeAdmission') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="card">
        <div class="card-header">
            <p class="font-bold">
                Fichiers de demande d'admission
            </p>
        </div>
        <div class="card-body">
            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3">
                <x-layout.partials.file-input label="Lettre de motivation" name="lettre_motivation" />

                <x-layout.partials.file-input label="CV" name="cv" />
                <x-layout.partials.file-input label="Relevé de BEPC" name="releve_bepc" />
                <x-layout.partials.file-input label="Relevé de BAC I" name="releve_bac_1" />
                <x-layout.partials.file-input label="Relevé de BAC II" name="releve_bac_2" />
            </div>
        </div>
    </div>
    <div class="">
        <div class="card card-navy collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Premier parcours</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <x-layout.partials.table-with-filter table-id="table1">

                    <x-slot:headers>
                        @foreach ($headers as $header)
                            <x-layout.partials.sortable-th :title="$header" />
                        @endforeach
                    </x-slot:headers>
                    <x-slot:body>
                        @foreach ($schedules() as $schedule)
                            <tr role="row" class="odd">
                                <td>{{ $schedule->titre_diplome }} - ({{ $schedule->school->nom }})</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="firstChoice"
                                            value="{{ $schedule->id }}" @checked(@old('firstChoice') == $schedule->id)>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot:body>
                </x-layout.partials.table-with-filter>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card card-success collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Deuxième parcours</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <x-layout.partials.table-with-filter table-id="table2">

                    <x-slot:headers>
                        @foreach ($headers as $header)
                            <x-layout.partials.sortable-th :title="$header" />
                        @endforeach
                    </x-slot:headers>
                    <x-slot:body>
                        @foreach ($schedules() as $schedule)
                            <tr role="row" class="odd">
                                <td>{{ $schedule->titre_diplome }} - ({{ $schedule->school->nom }})</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="secondChoice"
                                            value="{{ $schedule->id }}" @checked(@old('secondChoice') == $schedule->id)>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot:body>
                </x-layout.partials.table-with-filter>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card card-danger collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Troisième parcours</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <x-layout.partials.table-with-filter table-id="table3">

                    <x-slot:headers>
                        @foreach ($headers as $header)
                            <x-layout.partials.sortable-th :title="$header" />
                        @endforeach
                    </x-slot:headers>
                    <x-slot:body>
                        @foreach ($schedules() as $schedule)
                            <tr role="row" class="odd">
                                <td>{{ $schedule->titre_diplome }} - ({{ $schedule->school->nom }})</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="thirdChoice"
                                            value="{{ $schedule->id }}" @checked(@old('thirdChoice') == $schedule->id)>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot:body>
                </x-layout.partials.table-with-filter>
            </div>
            <!-- /.card-body -->
        </div>



        <div class="flex">
            <button type="null" class="btn btn-warning btn-lg">
                Enregistrer
            </button>
        </div>
    </div>
</form>
