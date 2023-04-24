@php
    $_admission = $admission
@endphp

<x-layout.layout title="Backoffice - Admissions" >
    <x-admin.check-admission :admission="$_admission"  />
</x-layout.layout>