<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        <x-adminlte-css />

    </style>
</head>
<body>
    @php
    $sum=[];
    
    foreach($payment->inscriptions as $inscription)
    {
    array_push($sum, $inscription->offer->credit);
    }
    @endphp
    
    <div class=" flex flex-col justify-between bg-white p-12">
    
        <x-file-en-tete title="Fiche d'inscription" :school-year="$payment->school_year" />
    
        <div>
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
                    </tbody>
                </table>
            </div>
    
            <div class="mt-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>
                                Intitulé
                            </th>
                            <th>
                                Prix unitaire (Fcfa)
                            </th>
                            <th>
                                Quantité
                            </th>
                            <th>
                                Total (Fcfa)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Unité d'enseignement
                            </td>
                            <td>
                                250
                            </td>
                            <td>
                                {{ array_sum($sum) }}
                            </td>
                            <td>
                                {{ array_sum($sum)*250 }}
                            </td>
                        </tr>
    
                        <tr>
                            <td>
                                Frais d'inscription
                            </td>
                            <td>
                                3500
                            </td>
                            <td>
                                01
                            </td>
                            <td>
                                3500
                            </td>
                        </tr>
    
                        <tr>
                            <td>
                                Mutuelle
                            </td>
                            <td>
                                3500
                            </td>
                            <td>
                                01
                            </td>
                            <td>
                                3500
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                Total
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <p>
                                        {{ (array_sum($sum)*250)+3500+3500 }}
                                    </p>
                                    @if($payment->status=="payed")
                                    <p class="font-bold px-4 text-success">
                                        Payé
                                        <i class="fa fa-check-circle"></i>
                                    </p>
                                    @endif
                                </div>
                            </td>
                        </tr>
    
                    </tbody>
                </table>
            </div>
        </div>
    
        {{-- <div class="flex justify-end">
            <p class="text-lg">
                {{ env('APP_NAME') }}
            </p>
        </div> --}}
        <x-file-pied-de-page />
    </div>
    
</body>
</html>
