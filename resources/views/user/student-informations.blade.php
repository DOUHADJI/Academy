<x-layout.layout title="Espace étudiant - Mes informations">
    <x-layout.partials.student-infos :student="Auth::user()->infos" />
    {{-- <x-user.student-infos-form  disabled="true"  /> --}}
</x-layout.layout>