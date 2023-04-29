<x-layout.layout title="Espace étudiant - Mes informations">
    <x-layout.partials.student-infos :student="Auth::user()->infos" />
</x-layout.layout>