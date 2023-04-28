<x-layout.layout title="Espace étudiant - Fiche UEs">
    <x-user.fiche-ues  />

    <div class="flex mt-8 px-8 justify-end">
        <a href="{{ route("printFicheUE") }}" class="btn btn-primary" target="blank">
            <i class="fa fa-print"></i>
            imprimer
        </a>
    
    </div>
    
</x-layout.layout>