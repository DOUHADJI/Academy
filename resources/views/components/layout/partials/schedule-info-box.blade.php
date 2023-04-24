@php
$bgs = [
"bg-navy",
"bg-success",
"bg-danger"
]
@endphp

<div class="position-relative">
    <div class="ribbon-wrapper">
        @if($admission -> status == "accepted")
        <div class="ribbon bg-success text-sm">
            {{  $admission -> status }}
        </div>
        @elseif ($admission -> status == "refused")
        <div class="ribbon bg-danger text-sm">
            {{  $admission -> status }}
        </div>
        @elseif ($admission -> status == "received")
        <div class="ribbon bg-warning text-xs text-white">
            {{  $admission -> status }}
        </div>
        @endif
        
    </div>

    <div class="info-box  h-full  {{ $bgs[$title - 1] }}">

        <div class="info-box-icon">
            <i class="fa fa-graduation-cap"></i>
        </div>
        <div class="info-box-content">
            <p class="font-bold text-lg mb-2 "> Choix N°{{ $title }}</p>
            <p class="mb-2">
                <span class="font-bold"> Parcours </span> : {{ $admission->schedule -> titre_diplome }}
            </p>
            <p class="mb-2">
                <span class="font-bold"> Ecole </span> : {{ $admission->schedule -> school -> nom }}
            </p>
        </div>

    </div>
</div>
