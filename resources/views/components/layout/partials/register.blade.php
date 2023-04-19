<x-app title="Page d'inscription">
    <div class="grid gradient min-h-screen sm:grid-cols-2">
        <div class="hidden sm:flex  sm:flex-col justify-center gap-6 boder-r-4 border-white ">
            <image alt="login image" src="{{ asset('images/mascot_2.jpg') }}" class="h-screen object-cover" />
        </div>
        <form action="" method="POST">
            <div class="flex flex-col justify-center items-center bg-white gap-6 px-12 h-screen ">
                <image src="{{ asset('images/GU-logo.webp') }}" class="h-[70px] object-fit" />
                <p class="text-xl text-gray-600 underline text-center font-extralight mb-6">Portail academique - Inscription</p>       

                @csrf
                <x-input name="email" type='text' icon='ti-email' placeholder='Adresse email' label="" />
                <x-input name="password" type='password' icon='ti-lock' placeholder='Mot de passe' label="" />
              

                <x-button title="Créer mon compte" type="submit" />

                <a href="{{ route('showLogin') }}" class="flexbox text-gray-400 font-light text-xl underline">
                    Déjà inscrit (e) ? Se connecter
                </a>


            </div>

        </form>


    </div>

</x-app>
