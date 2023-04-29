

<x-layout.partials.app title="Page de connexion">
    <div class="flex items-center justify-center gradient min-h-screen bg-yellow-200">

        <div class="elevation-2 px-4 py-24  bg-white ">
            <form action="{{ route("handleRegister") }}" method="POST">
                <div class="flex flex-col justify-center items-center gap-3 px-12  ">
                    <image src="{{ asset('images/GU-logo.webp') }}" class="h-[70px] object-fit " />
                    <p class="text-lg text-gray-600 underline text-center font-extralight mb-6">
                        Portail academique - Créer un compte
                    </p>

                    @csrf
                    <x-layout.partials.input name="email" type='text' icon='ti-email' placeholder='Adresse email' />
                    <x-layout.partials.input name="password" type='password' icon='ti-lock'
                        placeholder='Mot de passe' />

            

                   {{--  <div class="grid  gap-8 sm:grid-cols-2">

                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" value="1" name="remember_me"
                                id="checkbox">
                            <label for="checkbox" class="custom-control-label">se rappeler de moi</label>
                        </div>


                        <a href="#" class="flexbox text-gray-400 font-light underline">
                            Mot de passe oublié ?
                        </a>
                    </div> --}}

                    <div class="flex justify-end w-full">
                        <button class="btn btn-lg  bg-yellow-400 text-gray-100">
                            Enregistrer
                        </button>
                    </div>


                    <a href="{{ route('showLogin') }}" class="flexbox text-gray-400 font-light underline">
                        Déjà inscrit ? se connecter
                    </a>


                </div>

            </form>
        </div>

    </div>

</x-layout.partials.app>
