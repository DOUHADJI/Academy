<div class="card card-maroon">
    <div class="card-header">
        <h3 class="card-title">Ajouter une nouvelle école</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body" style="display: block;">
        <form action="{{ route('createSchool') }}" method="POST"
            class="grid gap-12 px-8 py-6 sm:grid-cols-2 md:grid-cols-4" id="newSchoolForm">
            @csrf
            <x-layout.partials.simple-input name="nom" label="Nom de la faculté" placeholder="nom de la faculté"
                type="text" required="true" />
            <x-layout.partials.simple-input name="sigle" label="Sigle de la faculté" placeholder="sigle"
                type="text" required="true" />
            <x-layout.partials.simple-input name="grades_disponibles" label="Grades (-)"
                placeholder="(Licence - Master - Doctorat)" type="text" required="true" />

        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="flex justify-end">
            <button form="newSchoolForm" class="btn btn-primary btn-lg">
                Enregistrer
            </button>
        </div>
    </div>
</div>


<div class="card card-navy">
    <div class="card-header">
        <h3 class="card-title">
            <p class="text-xl font-bold text-gray-500 mt-12 mb-8">
                Ecoles et facultés
            </p>
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            {{-- <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length"
                                aria-controls="example1"
                                class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries</label></div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                        aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Sigle: activate to sort column ascending">
                                    Sigle</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Nom complet: activate to sort column ascending">Nom complet</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                    Grades disponibles</th>
                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Détails: activate to sort column ascending"
                                    aria-sort="descending">Détails</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schools() as $school )
                            <tr role="row" class="odd">
                                <td class="" tabindex="0">{{ $school -> sigle }} </td>
                                <td>{{ $school -> nom }} </td>
                                <td>{{ $school -> grades_disponibles }} </td>
                                <td class="sorting_1"> 
                                    <a 
                                        href="{{ route("showSchool", $school->sigle) }}"
                                        class="btn btn-success  w-full"
                                    >
                                    Voir 
                                </a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Sigle</th>
                                <th rowspan="1" colspan="1">Nom complet</th>
                                <th rowspan="1" colspan="1">Grades disponibles</th>
                                <th rowspan="1" colspan="1">Détails</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
