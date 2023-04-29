@php
$sum=[];

foreach($payment->inscriptions as $inscription)
{
array_push($sum, $inscription->offer->credit);
}


$headers = ['Code', 'Intitulé', 'Crédit', 'Nature', 'Sem. Acad'];

@endphp

<div class="bg-white">

    <div class="p-12">

        <x-file-en-tete title="Fiche d'inscription" :school-year="$payment->school_year" />


        <div class="">

            <div>
                <div class="px-8 py-6 text-gray-600 ">
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


                    @if(Auth::user() -> role =="payment->student->infos")
                    <div class="flex w-full justify-end">
                        <a href="{{ route('updateStudent') }}" class="py-3 px-8 bg-purple-500 text-white hover:bg-purple-400">
                            informations</a>
                    </div>
                    @endif

                </div>
            </div>

            <div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>
                                Nom et prénoms
                            </td>
                            <td>
                                {{ $payment->student->infos->nom }} {{ $payment->student->infos->prenom }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Date et lieu de naissance
                            </td>
                            <td>
                                née le
                                {{ $payment->student->infos->date_naissance }} à
                                {{ $payment->student->infos->lieu_naissance }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Domaine
                            </td>
                            <td>
                                {{ $payment->schedule->domaine }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Grade
                            </td>
                            <td>
                                {{ $payment->schedule->grade }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Parcours
                            </td>
                            <td>
                                {{ $payment->schedule->titre_diplome }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Email
                            </td>
                            <td>
                                {{ $payment->student->email }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Numéro de téléphone
                            </td>
                            <td>
                                {{ $payment->student->infos->telephone }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Adresse
                            </td>
                            <td>
                                {{ $payment->student->infos->quartier }} -
                                {{ $payment->student->infos->ville }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="mt-12">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <p class="text-center font-bold">
                                    {{ $payment->schedule->titre_diplome }}
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p class="text-center font-medium">
                                    Unités d'enseignements choisis
                                </p>
                            </td>
                        </tr>
                        <tr>

                            <div class="p-8 bg-white">
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
                                $total = array_sum($sum);
                                @endphp
                                {{ $total }}
                            </th>
                            <th></th>
                            <th></th>

                        </tr>

                        </x-layout.partials.table-with-filter>
            </div>

            </tr>

            </tbody>
            </table>
        </div>


        <x-file-pied-de-page />
    </div>



</div>


{{-- <div class="flex mt-8 px-8 justify-end">
    <a href="{{ route("printFicheUE") }}" class="btn btn-primary" target="blank">
<i class="fa fa-print"></i>
imprimer
</a>

</div> --}}
