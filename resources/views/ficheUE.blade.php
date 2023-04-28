<x-file-wrapper>
    <div style="padding:12px">
        <div class="" style="background-color:rgba(243, 244, 246, .25); padding:3rem;">
            <div class="d-flex justify-content-center">
                <p class="">
                    {{ env('APP_NAME') }}
                </p>
            </div>

            <div class="d-flex justify-content-center">
                <p class="font-weight-bold text-center">
                    FICHE D'UNITES D'ENSEIGNEMENT
                </p>
            </div>





            <p>&nbsp;</p>




            <table class="table" style="border:solid 1px rgb(48, 48, 48); background-color:rgba(243, 244, 246, .25);font-size:14px !important">
                <tbody>
                    <tr style="border-bottom:solid 1px rgb(48, 48, 48)">
                        <td class="p-1" style="border-right:solid 1px rgb(48, 48, 48)">
                            Nom et prénom(s)
                        </td>
                        <td class="p-1">
                            {{ $payment->student->infos->nom }}
                        </td>
                    </tr>
                    <tr style="border-bottom:solid 1px rgb(48, 48, 48)">
                        <td class="p-1" style="border-right:solid 1px rgb(48, 48, 48)">
                            Date et lieu de naissance
                        </td>
                        <td class="p-1">
                            {{ $payment->student->infos->date_naissance }} à
                            {{ $payment->student->infos->lieu_naissance }}
                        </td>
                    </tr>
                    <tr style="border-bottom:solid 1px rgb(48, 48, 48)">
                        <td class="p-1" style="border-right:solid 1px rgb(48, 48, 48)">
                            Domaine
                        </td>
                        <td class="p-1">
                            {{ $payment->schedule->domaine }}
                        </td>
                    </tr>
                    <tr style="border-bottom:solid 1px rgb(48, 48, 48)">
                        <td class="p-1" style="border-right:solid 1px rgb(48, 48, 48)">
                            Grade
                        </td>
                        <td class="p-1">
                            {{ $payment->schedule->grade }}
                        </td>
                    </tr>
                    <tr style="border-bottom:solid 1px rgb(48, 48, 48)">
                        <td class="p-1" style="border-right:solid 1px rgb(48, 48, 48)">
                            Parcours
                        </td>
                        <td class="p-1">
                            {{ $payment->schedule->titre_diplome }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="font-weight-bold" style="border:solid 1px rgb(48,48,48);height:20px;font-size:12px">
                <p class="font-weight-bold text-center w-100">
                    Unités d'enseignement
                </p>
            </div>

            <table class="table table-striped" style="border:solid 1px rgb(48, 48, 48); background-color:rgba(243, 244, 246, .25);font-size:12px !important">

                <thead>
                    <tr class="font-weight-bold" style="border-bottom:solid 1px rgb(48, 48, 48);">
                        <td class="font-weight-bold" style="border-right:solid 1px rgb(48, 48, 48);">
                            Code
                        </td>
                        <td class="font-weight-bold" style="border-right:solid 1px rgb(48, 48, 48);">
                            Intitulé
                        </td>
                        <td class="font-weight-bold" style="border-right:solid 1px rgb(48, 48, 48);">
                            Crédit
                        </td class="font-weight-bold" style="border-right:solid 1px rgb(48, 48, 48);">
                        <td class="font-weight-bold" style="border-right:solid 1px rgb(48, 48, 48);">
                            Nature
                        </td>
                        <td class="font-weight-bold" style="border-right:solid 1px rgb(48, 48, 48);">
                            Sem. académique
                        </td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($payment->inscriptions as $inscription)
                    <tr role="row" class="" style="border-bottom:solid 1px rgb(48, 48, 48)">
                        <td class="p-1" style="border-right:solid 1px rgb(48, 48, 48)">
                            {{ $inscription->offer->code }}
                        </td>
                        <td class="p-1" style="border-right:solid 1px rgb(48, 48, 48)">
                            {{ $inscription->offer->intitule }}
                        </td>
                        <td class="p-1" style="border-right:solid 1px rgb(48, 48, 48)">
                            {{ $inscription->offer->credit }}
                        </td>
                        <td class="p-1" style="border-right:solid 1px rgb(48, 48, 48)">
                            {{ $inscription->offer->nature }}
                        </td>
                        <td class="p-1" style="border-right:solid 1px rgb(48, 48, 48)">
                            {{ $inscription->offer->semestre_academique }}
                        </td>

                    </tr>
                    @endforeach
                    <tr class="font-weight-bold" style="background-color: rgba(92, 92, 215, 0.791)">
                        <th style="border-right:solid 1px rgb(48, 48, 48)"></th>
                        <th class="w-full my-3 text-center" style="border-right:solid 1px rgb(48, 48, 48)">
                            Total
                        </th>
                        <th class=" text-center" style="border-right:solid 1px rgb(48, 48, 48)">
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
                        <th style="border-right:solid 1px rgb(48, 48, 48)"></th>
                        <th style="border-right:solid 1px rgb(48, 48, 48)"></th>

                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</x-file-wrapper>
