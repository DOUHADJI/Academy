<div>
    <div class="card card-navy">
        <div class="card-header">
           <p class="font-bold text-lg">
            <i class="fas fa-money-bill"></i>
            Montant de votre inscription
           </p>
        </div>
        <div class="card-body">
            @php
                $sum=[];

                foreach($payment->inscriptions as $inscription)
                {
                    array_push($sum, $inscription->offer->credit);
                }
            @endphp

            <div class="grid gap-8">
                <p class="text-lg">
                    Total des unités d'enseignement  : 
                    <span class="font-bold">{{ array_sum($sum) }}</span>
                </p>
                <p class="text-lg">
                    Prix unitaire d'une UE : 
                    <span class="font-bold">500 Fcfa</span>
                </p>

                <p class="text-lg">
                    Prix des Ues : 
                    <span class="font-bold">{{ array_sum($sum)*500 }} Fcfa</span>
                </p>

                <p class="text-lg">
                    Frais d'inscription : 
                    <span class="font-bold">{{ 3500 }} Fcfa</span>
                </p>
                
            </div>

           

        </div>
        <div class="card-footer bg-danger">
            <p class="font-bold text-lg">
                Total
                <span>{{ (array_sum($sum)*500 ) + 3500 }} Fcfa</span>
            </p>
        </div>
    </div>
</div>