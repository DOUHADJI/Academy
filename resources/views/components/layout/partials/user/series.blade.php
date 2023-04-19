@php
    $series = [ "A1" , "A2" , "A3" , "A4" , "A5" , "B", "BG" , "BTC" , "BTG", "BTM" , "C" , "D", "E", "F1" , "F2" , "F3" , "F4" , "G1" , "G2" , "G3" , "S", "Ti"]
@endphp

<x-layout.partials.select name="serie_bac" placeholder="serie" :options="$series" label="Série du Bac" required="true" />

