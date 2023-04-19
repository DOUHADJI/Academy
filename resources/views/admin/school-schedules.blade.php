@php
    $_school = $school;
    $_schedules = $schedules;
    $_selected = $selected_id;
    $_offers = $offers
@endphp

<x-layout.layout title="Backoffice - Ecoles et facultés" >
    <x-admin.school-schedules  :school="$_school" :schedules="$_schedules" :selected="$_selected" :offers="$_offers" />
</x-layout.layout>