<div>
    <div>
        <p class="px-8 py-2 border border-blue-600 my-8">
            <span><i class="fa fa-info-circle"></i></span>
            Vous avez la possiblité de créer de nouvelles épreuves ici. Ensuite dans 
            la rubrique "+ questions" vous pouvez ajouter des questions à chaque épreuve que 
             vous aurez créé.
        </p>
    </div>
    <form action="" method="POST">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                Ajouter une nouvelle épreuve
            </div>
            <div class="card-body">
                <div class="grid gap-8 md:grid-cols-3">
                    <div class="col-span-2 form-group">
                        <label for="">Créer une nouvelle épreuve</label>
                        <x-layout.partials.input 
                    icon="fa fa-list-alt"
                    type="text" name="exam" placeholder="Titre de l'épreuve" required="true"
                     />
                    </div>

                    <div class="form-group">
                        <label for="">Date de l'épreuve</label>
                        <x-layout.partials.input 
                        icon="fa fa-list-alt"
                        type="date" name="exam" placeholder="Date de l'épreuve" required="true"
                         />
                    </div>

                    <div class="form-group">
                        <label for="">Heure de l'épreuve</label>
                        <div class="flex items-center gap-3">
                            <select class="form-control" name="" id="">
                                <option value="">Heure</option>
                                @for ($i=0; $i<24; $i++)
                                    <option value="{{  $i+1 }}">
                                        @if($i<9)
                                        {{  "0". $i+1 }}
                                        @else
                                        {{  $i+1 }}
                                        @endif
                                    </option>
                                @endfor
                            </select>
                            <span>
                                H
                            </span>

                            <select class="form-control" name="" id="">
                                <option value="">minutes</option>
                                @for ($i=0; $i<24; $i++)
                                    <option value="{{  $i+1 }}">
                                        @if($i<9)
                                        {{  "0". $i+1 }}
                                        @else
                                        {{  $i+1 }}
                                        @endif
                                    </option>
                                @endfor
                            </select>
                             <span>
                                min
                            </span>

                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="flex justify-end">
                    <button class="btn btn-success">
                        Créer
                    </button>
                </div>
            </div>
        </div>
    </form>
   
</div>