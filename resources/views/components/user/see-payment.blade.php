@php
$sum=[];

foreach($payment->inscriptions as $inscription)
{
array_push($sum, $inscription->offer->credit);
}
@endphp

@if($payment->status=="pending")
<div class="flex items-end h-fit  gap-6">
    <form action="{{ route('validatePayment', [
        "payement" => $payment->id
    ]) }}" method="POST">
    @csrf

        <div class="form-group">
            <label for="">Code de confirmation de payement</label>
            <input type="text" 
            placeholder="entrer le code du payement"
            class="form-control @error('payment_code') is-invalid @enderror" name="payment_code">
            @error('payment_code')
                <p class="error text-danger">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="form-group">
            <button class="btn btn-success h-fit">
                Valider
            </button>
        </div>
    </form>
</div>
@endif

<div class="card mt-4">
    <div class="card-body bg-gray-100/75">
        <div class="flex justify-around">
            <p class="font-bold">
                Code payement : 
                <span>
                    {{ $payment->code }}
                </span>
            </p>

            <p class="font-bold">
                @if($payment->status == "pending")
                <span class="text-warning text-lg"> En attente</span>
                @endif

                @if($payment->status == "payed")
                <span class="text-success text-lg"> Effectué</span>
                <i class="fa fa-check-square ml-1 text-lg text-success"></i>
                @endif
            </p>
        </div>
    </div>
</div>

<div class="mt-4">
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
                    {{ (array_sum($sum)*250)+3500+3500 }}
                </td>
            </tr>

        </tbody>
    </table>
</div>


