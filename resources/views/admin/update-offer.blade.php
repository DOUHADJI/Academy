@php
    $_school = $school;
    $_schedule = $schedule;
    $_offer = $offer;
@endphp

<x-layout.layout title="Backoffice - Ecoles et facultés" >
    <x-layout.partials.admin.update-offer :school="$_school" :schedule="$_schedule"  :offer="$_offer" />
</x-layout.layout>