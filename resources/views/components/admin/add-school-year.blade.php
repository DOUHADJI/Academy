<form action="{{ route('StoreYear') }}" method="POST">
    @csrf
    <div class="p-12">
        <div class="bg-white p-8">
            <p class="font-bold mb-6 border-b pb-3 text-lg">
                Définir une nouvelle année scolaire
            </p>

            <div class="grid gap-4 md:grid-cols-2">

                <div class="form-group">
                    <label for="">Début de l'année scolaire *</label>
                    <x-layout.partials.input type="date" name="start" placeholder="" icon="true" />
                </div>

                <div class="form-group">
                    <label for="">Fin de l'année scolaire *</label>
                    <x-layout.partials.input type="date" name="end" placeholder="" icon="true" />
                </div>
           

            </div>
            <div class="flex p-4 justify-end">
                <button class="btn btn-success">
                    Enregistrer
                </button>
            </div>
        </div>
</form>
