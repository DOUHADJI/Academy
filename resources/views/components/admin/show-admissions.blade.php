@php
    $headers = ["Nom de l'étudiant", "Infos Bac" ,'Choix de parcours - (ecole)', 'Grade', 'Choix'];
    
@endphp

<div class="px-12 py-6">
    <div class="card card-navy">
        <div class="card-header">
            <p class="font-bold">
                Liste des admissions
            </p>
        </div>
        <div class="card-body">

            <x-layout.partials.table-with-filter table-id="admissionsTable">

                <x-slot:headers>
                    @foreach ($headers as $header)
                        <x-layout.partials.sortable-th :title="$header" />
                    @endforeach
                </x-slot:headers>
                <x-slot:body>
                    @foreach ($admissions() as $admission)
                        <tr role="row" class="odd">
                            <td>
                                {{ $admission->student->name }} 
                            </td>
                            <td>
                                Série : {{ $admission->student->infos->serie_bac }} 
                                - Mention :  ({{ $admission->student->infos->mention_bac }})
                                - Année :  ({{ $admission->student->infos->annee_bac }})
                            </td>
                            <td>
                                {{ $admission->schedule->titre_diplome }} - ({{ $admission->schedule->school->nom }})
                            </td>
                            <td>
                                {{ $admission->schedule->grade }}
                            </td>
                            <td>
                                <div class="form-check">
                                    <a href="{{ route("showAdmissions", [
                                        "admissionId" => $admission -> id
                                    ]) }}" class="text-center w-full underline">
                                        analyser
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:body>
            </x-layout.partials.table-with-filter>
        </div>
    </div>
</div>
