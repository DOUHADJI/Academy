@php
    $bgs = [
    "bg-navy",
    "bg-success",
    "bg-danger"
    ]
@endphp

<div class="info-box {{ $bgs[$title - 1] }}">
    <div class="info-box-icon">
        <i class="fa fa-graduation-cap"></i>
    </div>
    <div class="info-box-content">
        <p class="font-bold text-lg mb-2 "> Choix N°{{ $title }}</p>
        <p class="mb-2">
            <span class="font-bold"> Parcours </span> : {{ $schedule -> titre_diplome }}
         </p>
         <p class="mb-2">
             <span class="font-bold"> Ecole </span> : {{ $schedule -> school -> nom }}
         </p>
    </div>

</div>